<?php
function form($conn){

    echo "
        <form method='post'>
            <strong>Lejlighedsnummer</strong> <br />
            <select class='form-control' name='formCreateLejlighed'>
                <option value='St. TV.'>St. TV.</option>
                <option value='St. TH.'>St. TH.</option>
                <option value='1. TV.'>1. TV</option>
                <option value='1. TH.'>1. TH</option>
            </select>

            <strong>Tidspunkt</strong> <br />
            <input type='time' class='form-control' placeholder='Tidspunkt' name='formCreateTidspunkt' /><br />
            
            <strong>Vasketid</strong> <br />
            <select class='form-control' name='formCreateVasketid'>
                <option value='1 time'>1 time</option>
                <option value='2 timer'>2 timer</option>
            </select>

            <strong>Grader på vask</strong> <br />
            <select class='form-control' name='formCreateGrader'>
                <option value='30'>30</option>
                <option value='40'>40</option>
                <option value='60'>60</option>
                <option value='90'>90</option>
            </select>

            <label>Tørretumbler benyttes efterfølgende</label>
            <input class='form-control' type='checkbox' name='formCreateTumbler' checked='checked'>
            
            Type af vask
            <select class='form-control' name='formCreateType'>
                <option value='Lys'>Lys</option>
                <option value='Mørk'>Mørk</option>
                <option value='Kulør'>Kulør</option>
            </select>

            <input type='number' class='form-control' placeholder='Vægt' name='formCreateVaegt' /><br />

            <label>Skyllemiddel benyttes</label>
            <input class='form-control' type='checkbox' name='formCreateSkyllemiddel' checked='checked'>

            <label>Forvask benyttes</label>
            <input class='form-control' type='checkbox' name='formCreateForvask' checked='checked'>
           
            <input class='form-control btn btn-primary' type='submit' name='formCreateSubmit' value='Indsend vaskeoplysninger' />
        </form>
    ";

 
    if(isset($_POST['formCreateSubmit'])){
        $lejlighed = $_POST['formCreateLejlighed'];
        $sql = "insert into vask set ";

        $lejlighed = $_POST['formCreateLejlighed'];
        $sql .= " vask_lejlighed = '{$lejlighed}'";

        if(empty($_POST['formCreateTidspunkt'])){
           echo "Tidspunkt er ikke udfyldt.";
        }else{
            $tidspunkt = $_POST['formCreateTidspunkt'];
            $sql .= ", vask_tidspunkt = '{$tidspunkt}'";
        }

        $vasketid = $_POST['formCreateVasketid'];
        $sql .= ", vask_vasketid = '{$vasketid}'";

       
        $grader = $_POST['formCreateGrader'];
        $sql .= ", vask_grader = {$grader}";

        if(isset($_POST['formCreateTumbler'])){
            $sql .= ", vask_tumbler = 'Ja'";
        }else{
            $sql .= ", vask_tumbler = 'Nej'";
        }

        $type = $_POST['formCreateType'];
        $sql .= ", vask_type = '{$type}'";

        if(isset($_POST['formCreateSkyllemiddel'])){
            $sql .= ", vask_skyllemiddel = 'Ja'";
        }else{
            $sql .= ", vask_skyllemiddel = 'Nej'";
        }

        if(empty($_POST['formCreateVaegt'])){
           echo "Vægt er ikke udfyldt.";
        }else{
            $vaegt = $_POST['formCreateVaegt'];
            $sql .= ", vask_vaegt = '{$vaegt}'";
        }

        if(isset($_POST['formCreateForvask'])){
            $sql .= ", vask_forvask = 'Ja'";
        }else{
            $sql .= ", vask_forvask = 'Nej'";
        }
 
        if(!empty($_POST['formCreateTidspunkt']) && !empty($_POST['formCreateVaegt'])){
            if($conn->query($sql) == TRUE){
                echo "Vasken er indsendt";
            }else{
                echo "Fejl: " . $sql . "<br>" . $conn->error . "<br>";
            }
        }
    }        //header('location: '.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
}


function vis_observation($conn){
    $sql = "select * from vask order by vask_tidspunkt";
    $sqlQuery = $conn->query($sql);
            $intQuery = $sqlQuery->num_rows;
            if($intQuery == true){
                while($dbFetch = $sqlQuery->fetch_object()){
                    echo "
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'>{$dbFetch->vask_lejlighed}</h3>
                        </div>
                        <div class='panel-body'>
                            <h5>Tidspunkt</h5><br><p>{$dbFetch->vask_tidspunkt}</p>
                            <h5>Vasketid</h5><br><p>{$dbFetch->vask_vasketid}</p>
                            <h5>Grader</h5><br><p>{$dbFetch->vask_tidspunkt}</p>
                            <h5>Tidspunkt</h5><br><p>{$dbFetch->vask_grader}</p>
                            <h5>Tørretumbler</h5><br><p>{$dbFetch->vask_tumbler}</p>
                            <h5>Type</h5><br><p>{$dbFetch->vask_type}</p>
                            <h5>Skyllemiddel</h5><br><p>{$dbFetch->vask_skyllemiddel}</p>
                            <h5>Vægt</h5><br><p>{$dbFetch->vask_vaegt}</p>
                            <h5>Forvask</h5><br><p>{$dbFetch->vask_forvask}</p>        
                        </div>
                    </div>
                    ";
                }
}
