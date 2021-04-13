<?php

namespace App\Http\Controllers;

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
        return view('hola');
    }

    private function getSession(){
        session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['administrador']) && isset($_SESSION['activo'])){
            $mysqli = new mysqli('localhost', 'root', 'CJsenjetpack123', 'ccong');
                if(!($mysqli->connect_errno)){
                    $query = 'SELECT * FROM usuaris WHERE id='.$_SESSION['id'].'';
                    $result = $mysqli->query($query);
                    $counter = 0;
    
                    while($row = $result->fetch_assoc()){
                        $counter++;
                    }
                    
                    $mysqli->close();
    
                    if($counter > 0){
                        return true;
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

    public function inici(){
        if($this->getSession()){
            return view('inici');
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
    public function create()
    {
        if(isset($_POST['usuari']) && isset($_POST['contrasenya'])){
            $mysqli = new mysqli('localhost', 'root', 'CJsenjetpack123', 'ccong');
            if(!($mysqli->connect_errno)){
                $query = 'SELECT * FROM usuaris WHERE nom_usuari="'.$_POST['usuari'].'" and contrasenya="'.$_POST['contrasenya'].'"';
                $result = $mysqli->query($query);
                $data = [];

                while($row = $result->fetch_assoc()){
                    array_push($data, $row);
                }
                
                $mysqli->close();

                if(sizeof($data) > 0){
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
                    return 'Does not exist user '.$_POST['usuari'];
                }
            }else{
                return 'Can\'t connect: '.$mysqli->connect_errno;
            }
        }else{
            return 'Bad query';
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
