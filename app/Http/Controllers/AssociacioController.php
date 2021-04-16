<?php

namespace App\Http\Controllers;

use App\Models\Associacio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use mysqli;

class AssociacioController extends Controller
{

    public function index()
    {
        $session = $this->getSession();
        $path = Route::getCurrentRoute()->uri();

        if($session === true){
            switch($path){
                case 'associacio/create':
                    return view('associacions.associacio-create');
                    break;
                case 'associacions': 
                    $associacions = $this->select('associacio');
                    return view('associacions.associacions', ['associacions' => $associacions]); 
                    break;
            }
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
                'nom' => 'required',
                'adreca' => 'required',
                'poblacio' => 'required',
                'commarca' => 'required',
                'declaracio' => 'required',
                'tipus' => 'required'
            ]);
    
            $associacio = new Associacio([
                'cif' => $request->get('cif'),
                'nom' => $request->get('nom'),
                'adreca' => $request->get('adreca'),
                'poblacio' => $request->get('poblacio'),
                'commarca' => $request->get('commarca'),
                'declaracio' => $request->get('declaracio'),
                'tipus' => $request->get('tipus')
            ]);
    
            $status = $associacio->save();

            $message = '';

            if($status){
                $message = "L'associació ".$request->get('nom')." s'ha afegit correctament.";
            }else{
                $message = "No s'ha pogut afegir l'associació ".$request->get('nom').".";
            }
    
            return view('associacions.associacio-state', ['missatge' => $message]);
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
                'cif' => 'required'
            ]);

            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){
                $query = 'DELETE from associacio WHERE CIF="'.$request->get('cif').'"';
                $result = $mysqli->query($query);
                
                $mysqli->close();
    
                if($result){
                    return view('associacions.associacio-state', ['missatge' => "S'ha eliminat l'associació"]);
                }else{
                    return view('associacions.associacio-state', ['missatge' => "No s'ha pogut eliminar l'associació"]);
                }
    
                
            }else{
                return view('associacions.associacio-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }

        
    }
}
