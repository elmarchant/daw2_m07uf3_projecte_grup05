<?php

namespace App\Http\Controllers;

use App\Models\Soci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use mysqli;

class SociController extends Controller
{
    public function index()
    {
        $session = $this->getSession();
        $path = Route::getCurrentRoute()->uri();

        if($session === true){
            switch($path){
                case 'soci/create':
                    return view('socis.soci-create');
                    break;
                case 'socis': 
                    $socis = $this->select('soci');
                    return view('socis.socis', ['socis' => $socis]); 
                    break;
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }
    
    public function info($nif){
        $session = $this->getSession();
        $path = Route::getCurrentRoute()->uri();

        if($session === true){
            $soci = $this->select('soci', '*', 'WHERE NIF="'.$nif.'"');
            return view('socis.soci-info', ['soci' => $soci[0]]);
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
                'nif' => 'required',
                'nom' => 'required',
                'cognom' => 'required'
            ]);
    
            $soci = new Soci([
                'nif' => $request->get('nif'),
                'nom' => $request->get('nom'),
                'cognom' => $request->get('cognom'),
                'correu' => $request->get('correu'),
                'mobil' => $request->get('mobil'),
                'tel_fixa' => $request->get('tel_fixa'),
                'adreca' => $request->get('adreca'),
                'poblacio' => $request->get('poblacio'),
                'commarca' => $request->get('commarca')
            ]);
    
            $status = $soci->save();

            $message = '';

            if($status){
                $message = "El nou soci ".$request->get('nom')." ".$request->get('cognom')." s'ha afegit correctament.";
            }else{
                $message = "No s'ha pogut afegir el soci ".$request->get('nom')." ".$request->get('cognom').".";
            }
    
            return view('socis.soci-state', ['missatge' => $message]);
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    public function destroy(Request $request){
        $session = $this->getSession();

        if($session === true){
            $this->validate($request, [
                'nif' => 'required'
            ]);

            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){
                $query = 'DELETE from soci WHERE NIF="'.$request->get('nif').'"';
                $result = $mysqli->query($query);
                
                $mysqli->close();
    
                if($result){
                    return view('socis.soci-state', ['missatge' => "S'ha eliminat el soci"]);
                }else{
                    return view('socis.soci-state', ['missatge' => "No s'ha pogut eliminar el soci"]);
                }
    
                
            }else{
                return view('socis.soci-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    public function modify($nif)
    {
        $session = $this->getSession();

        if($session === true){

            $data = $this->select('soci', '*', 'WHERE NIF="'.$nif.'"');

            if(sizeof($data) > 0){
                return view('socis.soci-update', ['data' => $data[0]]);
            }else{
                return view('socis.soci-state', ['missatge' => "L'associació no existeix."]);
            }    
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    public function update(Request $request, $nif, $attribute)
    {
        $session = $this->getSession();
        
        $this->validate($request, [$attribute => 'required']);
        $query = 'UPDATE soci SET '.$attribute.'="'.$request->get($attribute).'" WHERE NIF="'.$nif.'"';
    
        if($session === true){
            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){

                $result = $mysqli->query($query);
                
                $mysqli->close();
    
                if($result){
                    return view('socis.soci-state', ['missatge' => "Modificació satisfactòria"]);
                }else{
                    return view('socis.soci-state', ['missatge' => "No s'ha pogut modificar"]);
                }
    
                
            }else{
                return view('socis.soci-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }
}