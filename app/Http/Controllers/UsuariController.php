<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use mysqli;

class UsuariController extends Controller
{

    public function index()
    {
        $session = $this->getSession();

        if($session === true){
            $usuaris = $this->select('usuaris');
            return view('usuaris.usuaris', ['usuaris' => $usuaris]); 
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    public function create()
    {
        $session = $this->getSession();

        if($session === true){
            return view('usuaris.usuari-create');
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    private function select($table, $cols = '*', $filter=''){
        $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
        
        if(!($mysqli->connect_errno)){
            $result = $mysqli->query("SELECT ${cols} FROM ${table} ${filter}");
            $data = [];

            while($row = $result->fetch_assoc()){
                array_push($data, $row);
            }
            
            $mysqli->close();

            return $data;
        }else{
            return null;
        }
    }

    public function modify($id)
    {
        $session = $this->getSession();

        if($session === true){
            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){
                $query = 'SELECT id, nom, nom_usuari, administrador FROM usuaris WHERE id='.$id;
                $result = $mysqli->query($query);
                $data = [];

                while($row = $result->fetch_assoc()){
                    array_push($data, $row);
                }
                
                $mysqli->close();
    
                if(sizeof($data) > 0){
                    return view('usuaris.usuari-update', ['data' => $data[0]]);
                }else{
                    return view('usuaris.usuari-state', ['missatge' => "L'usuari no existeix."]);
                }
    
                
            }else{
                return view('usuaris.usuari-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
            }     
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    private function getSession(){
        session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['administrador']) && isset($_SESSION['activo'])){
            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
                if(!($mysqli->connect_errno)){
                    $query = 'SELECT * FROM usuaris WHERE id='.$_SESSION['id'].'';
                    $result = $mysqli->query($query);
                    $counter = 0;
    
                    while($row = $result->fetch_assoc()){
                        $counter++;
                    }
                    
                    $mysqli->close();
    
                    if($counter > 0){
                        if($_SESSION['activo'] == 'false'){
                            $path = Route::getCurrentRoute()->uri();
                            if($path == 'self/password' || $path == 'self/update/password'){
                                return true;
                            }else{
                                return redirect('/self/password');
                            }
                        }else{
                            return true;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
        }else{
            return false;
        }
    }

    public function store(Request $request){
        $session = $this->getSession();

        if($session === true){
            $this->validate($request, [
                'nom' => 'required',
                'nom_usuari' => 'required',
                'contrasenya' => 'required',
                'rol' => 'required'
            ]);
    
            $rol = false;
    
            if($request->get('rol') == 'true'){
                $rol = true;
            }
    
            $usuari = new Usuari([
                'nom' => $request->get('nom'),
                'nom_usuari' => $request->get('nom_usuari'),
                'contrasenya' => md5($request->get('contrasenya')),
                'administrador' => $rol,
                'activo' => false
            ]);
    
            $status = $usuari->save();

            $message = '';

            if($status){
                $message = "L'usuari ".$request->get('nom_usuari')." s'ha afegit correctament.";
            }else{
                $message = "No s'ha pogut afegir l'usuari ".$request->get('nom_usuari').".";
            }
    
            return view('usuaris.usuari-state', ['missatge' => $message]);
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    public function update(Request $request, $id, $attribute)
    {
        $session = $this->getSession();
        $path = Route::getCurrentRoute()->uri();
        $query = '';
        
        switch($attribute){
            case 'nom':
                $this->validate($request, ['nom' => 'required']);
                $query = 'UPDATE usuaris SET nom="'.$request->get('nom').'" WHERE id='.$id;
                break;
            case 'nomUsuari':
                $this->validate($request, ['nom_usuari' => 'required']);
                $query = 'UPDATE usuaris SET nom_usuari="'.$request->get('nom_usuari').'" WHERE id='.$id;
                break;
            case 'contrasenya':
                $this->validate($request, ['contrasenya' => 'required']);
                $query = 'UPDATE usuaris SET contrasenya="'.md5($request->get('contrasenya')).'" WHERE id='.$id;
                break;
            case 'rol':
                $this->validate($request, ['rol' => 'required']);
                $query = 'UPDATE usuaris SET administrador='.$request->get('rol').' WHERE id='.$id;
                break;
        }
    
        if($session === true){
            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){

                $result = $mysqli->query($query);
                
                $mysqli->close();
    
                if($result){
                    return view('usuaris.usuari-state', ['missatge' => "Modificació satisfactòria"]);
                }else{
                    return view('usuaris.usuari-state', ['missatge' => "No s'ha pogut modificar"]);
                }
    
                
            }else{
                return view('usuaris.usuari-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    public function destroy(Request $request){
        session_start();
        $this->validate($request, [
            'id' => 'required',
            'nom_usuari' => 'required'
        ]);

        $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
        if(!($mysqli->connect_errno)){
            $query = 'DELETE from usuaris WHERE id='.$request->get('id').' AND nom_usuari="'.$request->get('nom_usuari').'"';
            $result = $mysqli->query($query);
            
            $mysqli->close();

            if($result){
                return view('usuaris.usuari-state', ['missatge' => "S'ha eliminat l'usuari ".$request->get('nom_usuari')]);
            }else{
                return view('usuaris.usuari-state', ['missatge' => "No s'ha pogut eliminar l'usuari ".$request->get('nom_usuari')]);
            }

            
        }else{
            return view('usuaris.usuari-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
        }
    }
}
