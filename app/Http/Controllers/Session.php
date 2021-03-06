<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use mysqli;

class Session extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = $this->getSession();

        if($session === true){
            $self = $this->select('usuaris', '*', 'WHERE id='.$_SESSION['id']);
            return view('inici', ['self' => $self[0]]);
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

    public function self(Request $request){
        if($this->getSession()){
            $path = Route::getCurrentRoute()->uri();

            switch($path){
                case 'self': return view('self'); break;
                case 'self/password': return view('self-password'); break;
                case 'self/update/password':
                    $this->validate($request, [
                        'contrasenya' => 'required',
                        're-contrasenya' => 'required'
                    ]);
                    if($request->get('contrasenya') == $request->get('re-contrasenya')){
                        $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
                        if(!($mysqli->connect_errno)){
                            $query = 'UPDATE usuaris SET contrasenya="'.md5($request->get('contrasenya')).'", activo=true WHERE id='.$_SESSION['id'].'';
                            $result = $mysqli->query($query);

                            if($result){
                                $_SESSION['activo'] = 'true';
                                return redirect('/inici');
                            }else{
                                return 'Error';
                            }
                            
                        }else{
                            return 'Can\'t connect to database.';
                        }
                    }else{
                        return 'Les contrasenyes no coincideixen';
                    }
                    break;
            }
        }else{
            return redirect('/');
        }
    }

    public function login(){
        if(!$this->getSession()){
            return view('login');
        }else{
            return redirect('/inici');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'usuari' => 'required',
            'contrasenya' => 'required'
        ]);

        $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){
                $query = 'SELECT * FROM usuaris WHERE nom_usuari="'.$request->get('usuari').'"';
                $result = $mysqli->query($query);
                $data = [];

                while($row = $result->fetch_assoc()){
                    array_push($data, $row);
                }
                
                $mysqli->close();

                if(sizeof($data) > 0){
                    if(md5($request->get('contrasenya')) === $data[0]['contrasenya']){
                        session_start();
                        $_SESSION['id'] = $data[0]['id'];
                        if(intval($data[0]['administrador']) == 1){
                            $_SESSION['administrador'] = 'true';
                        }else if(intval($data[0]['administrador']) == 0){
                            $_SESSION['administrador'] = 'false';
                        }

                        if(intval($data[0]['activo']) == 1){
                            $_SESSION['activo'] = 'true';
                        }else if(intval($data[0]['activo']) == 0){
                            $_SESSION['activo'] = 'false';
                        }
                        
                        return redirect('/inici'); 
                    }else{
                        return 'Contrasenya incorrecta';
                    }
                }else{
                    return 'Does not exist user '.$request->get('usuari');
                }
            }else{
                return 'Can\'t connect: '.$mysqli->connect_errno;
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function modify($id)
    {
        $session = $this->getSession();

        if($session === true){

            $data = $this->select('usuaris', 'id, nom, nom_usuari', 'WHERE id="'.$id.'"');

            if($data !== null){
                if(sizeof($data) > 0){
                    return view('update', [
                            'data' => $data[0]
                        ]);
                }else{
                    return view('state', ['missatge' => "El usuari no existeix."]);
                } 
            }else{
                return view('state', ['missatge' => "No s'ha pogut obtendre les dades del usuari."]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $attribute)
    {
        $session = $this->getSession();
        
        $value = $request->get($attribute);

        if($attribute == 'contrasenya'){
            $value = md5($request->get($attribute));
        }

        $this->validate($request, [$attribute => 'required']);
        $query = 'UPDATE usuaris SET '.$attribute.'="'.$value.'" WHERE id="'.$id.'"';
    
        if($session === true){
            $mysqli = new mysqli('localhost', 'ccong', 'CCONGManagement123', 'ccong');
            if(!($mysqli->connect_errno)){

                $result = $mysqli->query($query);
                
                $mysqli->close();
    
                if($result){
                    return view('state', ['missatge' => "Modificaci?? satisfact??ria"]);
                }else{
                    return view('state', ['missatge' => "No s'ha pogut modificar"]);
                }
    
                
            }else{
                return view('state', ['missatge' => "Error en la conexi??: ".$mysqli->connect_errno]);
            }
        }else if($session === false){
            return redirect('/');
        }else{
            return $session;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['administrador']);
        unset($_SESSION['activo']);
        session_destroy();

        return redirect('/');
    }
}
