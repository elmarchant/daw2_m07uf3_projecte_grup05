<?php

namespace App\Http\Controllers;

use App\Models\Treballador;
use App\Models\Voluntari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use mysqli;

class VoluntariController extends Controller
{
    public function index()
    {
        $session = $this->getSession();

        if($session === true){
            $voluntaris = $this->select('voluntari', 'treballador.nif, nom, cognom, edat', 'INNER JOIN treballador WHERE voluntari.nif = treballador.nif');
            return view('voluntaris.voluntaris', ['voluntaris' => $voluntaris]); 
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
            $associacions = $this->select('associacio', 'cif, nom');
            if($associacions === null){
                return view('voluntaris.voluntari-state', ['missatge' => "Error: No es pot afegir ningú voluntari porque no existeix ninguna Associació."]);
            }else{
                return view('voluntaris.voluntari-create', ['associacions' => $associacions]);
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
            $voluntari = $this->select('voluntari', '*', 'INNER JOIN treballador WHERE voluntari.nif = treballador.nif AND voluntari.nif="'.$nif.'"');
            $associacio = $this->select('treballador', 'associacio.nom as nom', 'INNER JOIN associacio WHERE treballador.cif = associacio.cif AND nif="'.$nif.'"');
            return view('voluntaris.voluntari-info', [
                'voluntari' => $voluntari[0],
                'associacio' =>  $associacio[0]
            ]);
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

            if($result){
                while($row = $result->fetch_assoc()){
                    array_push($data, $row);
                }
            }else{
                return null;
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
                'cognom' => 'required',
                'cif' => 'required',
                'data_ingres' => 'required'
            ]);
    
            $treballador = new Treballador([
                'nif' => $request->get('nif'),
                'nom' => $request->get('nom'),
                'cognom' => $request->get('cognom'),
                'correu' => $request->get('correu'),
                'mobil' => $request->get('mobil'),
                'tel_fixa' => $request->get('tel_fixa'),
                'adreca' => $request->get('adreca'),
                'poblacio' => $request->get('poblacio'),
                'commarca' => $request->get('commarca'),
                'data_ingres' => $request->get('data_ingres'),
                'cif' => $request->get('cif')
            ]);
    
            $status = $treballador->save();

            $message = '';

            if($status){
                $voluntari = new Voluntari([
                    'nif' => $request->get('nif'),
                    'professio' => $request->get('professio'),
                    'hores' => intval($request->get('hores')),
                    'edat' => $request->get('edat')
                ]);

                $status = $voluntari->save();

                if($status){
                    $message = "El nou voluntari ".$request->get('nom')." ".$request->get('cognom')." s'ha afegit correctament.";
                }else{
                    $message = "No s'ha pogut afegir el voluntari ".$request->get('nom')." ".$request->get('cognom').".";
                }
            }else{
                $message = "No s'ha pogut afegir el voluntari ".$request->get('nom')." ".$request->get('cognom').".";
            }
    
            return view('voluntaris.voluntari-state', ['missatge' => $message]);
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
                $query = 'DELETE from voluntari WHERE NIF="'.$request->get('nif').'"';
                $query2 = 'DELETE from treballador WHERE NIF="'.$request->get('nif').'"';
                $result = $mysqli->query($query);
    
                if($result){
                    $result2 = $mysqli->query($query2);
                    $mysqli->close();

                    if($result2){
                        return view('voluntaris.voluntari-state', ['missatge' => "S'ha eliminat el voluntari"]);
                    }else{
                        return view('voluntaris.voluntari-state', ['missatge' => "No s'ha pogut eliminar el treballador"]);
                    }
                }else{
                    $mysqli->close();
                    return view('voluntaris.voluntari-state', ['missatge' => "No s'ha pogut eliminar el voluntari"]);
                }
    
                
            }else{
                return view('voluntaris.voluntari-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
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

            $data = $this->select('voluntari', '*', 'INNER JOIN treballador WHERE voluntari.nif = treballador.nif AND voluntari.nif="'.$nif.'"');
            $associacions = $this->select('associacio', 'cif, nom');

            if($data !== null){
                if(sizeof($data) > 0){
                    return view('voluntaris.voluntari-update', [
                            'data' => $data[0],
                            'associacions' => $associacions
                        ]);
                }else{
                    return view('voluntaris.voluntari-state', ['missatge' => "El treballador no existeix."]);
                } 
            }else{
                return view('voluntaris.voluntari-state', ['missatge' => "No s'ha pogut obtendre les dades del treballador."]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    public function update(Request $request, $nif, $tabla, $attribute)
    {
        $session = $this->getSession();
        
        $this->validate($request, [$attribute => 'required']);
        $query = 'UPDATE '.$tabla.' SET '.$attribute.'="'.$request->get($attribute).'" WHERE NIF="'.$nif.'"';
    
        if($session === true){
            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){

                $result = $mysqli->query($query);
                
                $mysqli->close();
    
                if($result){
                    return view('voluntaris.voluntari-state', ['missatge' => "Modificació satisfactòria"]);
                }else{
                    return view('voluntaris.voluntari-state', ['missatge' => "No s'ha pogut modificar"]);
                }
    
                
            }else{
                return view('voluntaris.voluntari-state', ['missatge' => "Error en la conexió: ".$mysqli->connect_errno]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }
}
