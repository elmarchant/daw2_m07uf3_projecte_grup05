<?php

namespace App\Http\Controllers;

use App\Models\Vincle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use mysqli;

class VincleController extends Controller
{
    public function index()
    {
        $session = $this->getSession();

        if($session === true){
            $vincles = $this->select('formen', 'id, associacio.nom as associacio, concat(soci.nom, " ", soci.cognom) as soci, data_associacio, quota' , 'INNER JOIN associacio, soci WHERE associacio.cif = formen.cif AND soci.nif = formen.nif');
            return view('vincles.vincles', ['vincles' => $vincles]); 
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
            $associacions = $this->select('associacio', 'cif, nom as associacio');
            $socis = $this->select('soci', 'nif, concat(nom, " ", cognom) as soci');
            return view('vincles.vincle-create', [
                'associacions' => $associacions,
                'socis' => $socis
            ]);
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }
    
    public function info($nif){
        $session = $this->getSession();

        if($session === true){
            $vincle = $this->select('vincle', '*', 'WHERE NIF="'.$nif.'"');
            return view('vincles.vincle-info', ['vincle' => $vincle[0]]);
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
                'cif' => 'required',
                'nif' => 'required'
            ]);
    
            $vincle = new Vincle([
                'cif' => $request->get('cif'),
                'nif' => $request->get('nif'),
                'quota' => $request->get('quota'),
                'data_associacio' => $request->get('data_associacio')
            ]);
    
            $status = $vincle->save();

            $message = '';

            if($status){
                $message = "Vinculació correcta.";
            }else{
                $message = "No s'ha pogut vincular.";
            }
    
            return view('vincles.vincle-state', ['missatge' => $message]);
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
                'id' => 'required'
            ]);

            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){
                $query = 'DELETE from formen WHERE id='.$request->get('id').'';
                $result = $mysqli->query($query);
                
                $mysqli->close();
    
                if($result){
                    return view('vincles.vincle-state', ['missatge' => "S'ha eliminat el vincle"]);
                }else{
                    return view('vincles.vincle-state', ['missatge' => "No s'ha pogut eliminar el vincle"]);
                }
    
                
            }else{
                return view('vincles.vincle-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }
}
