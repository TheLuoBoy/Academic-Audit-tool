<?php
    include 'commons.php';
    class View_logic
    {
        private dbconnect $Connect;

        public function __construct(){
            $this->Connect = new dbconnect();

        }

        //////////////////////////////////////////////////////////////////////
        ///function Processing authentication logins of the user///
        ////////////////////////////////////////////////////////////////////
        public function login(): void{
            if (isset($_POST['submit'])){
                if ($_POST['login_user'] != null && chop($_POST['login_user']) != "" && $_POST['login_pass'] != null){
                    $u = $_POST['login_user'];
                    $ps = $_POST['login_pass'];
                    $Connect = new dbconnect();
                    $result = $Connect->getData("SELECT * FROM authentications WHERE username= '$u' AND password='$ps'");
                    $Connect->CloseConnection();
                    if ($result != null){
                        $_SESSION['user'] = $result[0]['staff_id'];
                        $_SESSION['username'] = $result[0]['username'];
                        header("location: ../dash1.0/dashboard.php");
                        exit();

                    }


                }
            }


        }


        //////////////////////////////////////////////////////////////////////
        ///function Processing Peer reviewed publications form for the user///
        /////////////////////////////////////////////////////////////////////

        public function publications(): void{
            if(isset($_POST['submit_upload'])){
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                if ($imageFileType == "csv" || $imageFileType == "xls" || $imageFileType == "xlsx" || $imageFileType == "numbers"){
                    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                        ////extracting data from the file






                        header("location: profc.php");
                    } else {
                        echo "Failed to upload";
                    }
                }else{
                    echo 'extension: Invalid file';
                }

            }else if(isset($_POST['submit_form'])){
                try {
                    $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo 'connected successfully';

                    $statement = $this->Connect->conn->prepare("INSERT INTO peer_reviewed_publications(author,title,publication_year,`type`,publisher,volume_number,ISBN) VALUES (:a,
                                           :b,:c,:d,:e,
                                           :f,:g)");

                    for($i = 0; $i< sizeof($_POST['a']); $i++){
                        $statement->bindParam(':a',$_POST['a'][$i]);
                        $statement->bindParam(':b',$_POST['b'][$i]);
                        $statement->bindParam(':c',$_POST['c'][$i]);
                        $statement->bindParam(':d',$_POST['d'][$i]);
                        $statement->bindParam(':e',$_POST['e'][$i]);
                        $statement->bindParam(':f',$_POST['f'][$i]);
                        $statement->bindParam(':g',$_POST['g'][$i]);
                        $statement->execute();

                        $id = $this->Connect->conn->lastInsertId();
                        $this->Connect->conn->exec("INSERT INTO peer_reviewed_publications_has_staff_info VALUES($id,".$_SESSION['user'].")");

                    }

                    header("location:profc.php");

                } catch (PDOException $e) {
                    $this->Connect->CloseConnection();
                    echo "Something went wrong \n" . $e->getMessage();
                    echo '<script>alert("an error occurred")</script>';
                }
                $this->Connect->CloseConnection();
                exit();


            }

        }

        //////////////////////////////////////////////////////////////////////
        ///function Processing Scientific communications form for the user///
        ////////////////////////////////////////////////////////////////////

        public function Scientific_comm(): void{
            if (isset($_POST['submit'])){
                $plt = $_POST['platform'];
                $dt = $_POST['comm_date'];
                $tp = $_POST['topic'];
                $problem = $_POST['problems'];
                $soln = $_POST['solutions'];

                $location_name = "../uploads/Scientific_common_challenge_sol_".$_SESSION['user'].".txt";
                $my_file = fopen($location_name, 'w');
                fwrite($my_file,"Challenges: \n".$problem."\n\n");
                fwrite($my_file,"Solutions: \n\n".$soln."\n");
                fclose($my_file);

                try {
                    $this->Connect->conn->exec("INSERT INTO  scientific_communications(staff_id,platform_name,com_date,topic,challenge_solutions) VALUES('".$_SESSION['user']."','$plt','$dt','$tp','$location_name');");
                    header('location: resrch.php');

                } catch (PDOException $e) {
                    echo "Something went wrong \n" . $e->getMessage();
                    echo '<script>alert("an error occurred")</script>';
                    $this->Connect->CloseConnection();

                }
                $this->Connect->CloseConnection();
                exit();


            }
        }


        ////////////////////////////////////////////////////////////////
        ///function Processing forms for the professional conferences///
        ///////////////////////////////////////////////////////////////
        /**
         *
         * @function: professional_conferences
         * @param:none
         * @return:void
         */
        public function professional_conferences(): void{
            if(isset($_POST['submit'])){
                try {
                    $statement = $this->Connect->conn->prepare("INSERT INTO conferences_attended(conference_name,`role`, location, url) VALUES (:title,
                                               :role,:location,:url)");
                    for($j = 0;$j<sizeof($_POST['title']);$j++){
                        $statement->bindParam(':title',$_POST['title'][$j]);
                        $statement->bindParam(':role',$_POST['role'][$j]);
                        $statement->bindParam(':location',$_POST['location'][$j]);
                        $statement->bindParam(':url',$_POST['url'][$j]);

                        $statement->execute();
                        $id = $this->Connect->conn->lastInsertId();
                        $this->Connect->conn->exec("INSERT INTO conferences_attended_has_staff_info VALUES($id,".$_SESSION['user'].")");

                    }
                    header("location: scient.php");

                } catch (PDOException $e) {
                    echo "Something went wrong \n" . $e->getMessage();
                    echo '<script>alert("an error occurred")</script>';
                    $this->Connect->CloseConnection();
                }
                $this->Connect->CloseConnection();


            }


        }

        //////////////////////////////////////////////////////////////
        ///processing outreaches/community placements and internship//
        /////////////////////////////////////////////////////////////

        public function outreach(): void{
            if(isset($_POST['btn_submit'])){
                    try {
                        $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        echo 'connected successfully';

                        $statement = $this->Connect->conn->prepare("INSERT INTO internship_supervision(student_fname,student_lname,course_pursued,company_name,location,regNo) VALUES (:a,
                                               :b,:c,:d,:e,:f)");
                        for($i = 0; $i< sizeof($_POST['student_fname']); $i++){
                            $statement->bindParam(':a',$_POST['student_fname'][$i]);
                            $statement->bindParam(':b',$_POST['student_lname'][$i]);
                            $statement->bindParam(':c',$_POST['course_pursued'][$i]);
                            $statement->bindParam(':d',$_POST['company_name'][$i]);
                            $statement->bindParam(':e',$_POST['location'][$i]);

                            $statement->bindParam(':f',$_POST['regNo'][$i]);

                            $statement->execute();

                            $id = $this->Connect->conn->lastInsertId();
                            $this->Connect->conn->exec("INSERT INTO internship_supervision_has_staff_info VALUES($id,".$_SESSION['user'].")");

                        }

                        //other outreaches

                        $statement->closeCursor();

                        $statement = $this->Connect->conn->prepare("INSERT INTO  other_outreach_programs(program_title,date_carrriedout, program_location,total_beneficiaries,challenge_solution) VALUES (:a,
                                               :b,:c,:d,null)");
                        for($i = 0; $i< sizeof($_POST['program']); $i++){
                            $statement->bindParam(':a',$_POST['program'][$i]);
                            $statement->bindParam(':b',$_POST['outreach_date'][$i]);
                            $statement->bindParam(':c',$_POST['program_location'][$i]);
                            $statement->bindParam(':d',$_POST['beneficiary'][$i]);

                            $statement->execute();

                            $id = $this->Connect->conn->lastInsertId();
                            $this->Connect->conn->exec("INSERT INTO other_outreach_programs_has_staff_info VALUES($id,".$_SESSION['user'].")");

                        }

                        header("location: ../link_point/rank.php");

                    } catch (PDOException $e) {
                        $this->Connect->CloseConnection();
                        echo "Something went wrong \n" . $e->getMessage();
                        echo '<script>alert("an error occurred")</script>';
                        return;
                    }


                    echo"<script>alert('Student Successfully added');</script>";
                }

        }


        //////////////////////////////////////////////////////////////
        ///processing supervision of Master and PhD students/////////
        /////////////////////////////////////////////////////////////

        function supervisions(): void
        {

            if (isset($_POST['btn_submit'])) {
                if ($_POST['ongoing_sup'][0] == 'YES' && $_POST['comp_sup'][0] == 'YES') {
                    try {
                        $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        echo 'connected successfully';

                        // completed supervisions
                        $statement = $this->Connect->conn->prepare("INSERT INTO  supervisions_completed(student_fname,student_lname,research_title,start_year,completion_year,nature_supervision,awarding_university,challenge_solution) VALUES (:a,
                                               :b,:c,:d,:e,
                                               :f,:g, null)");

                        for ($i = 0; $i < sizeof($_POST['student_fname']); $i++) {
                            $statement->bindParam(':a', $_POST['student_fname'][$i]);
                            $statement->bindParam(':b', $_POST['student_lname'][$i]);
                            $statement->bindParam(':c', $_POST['research_title'][$i]);
                            $statement->bindParam(':d', $_POST['start_year'][$i]);
                            $statement->bindParam(':e', $_POST['completion_yea'][$i]);
                            $statement->bindParam(':f', $_POST['nature_supervision'][$i]);
                            $statement->bindParam(':g', $_POST['awarding_university'][$i]);
                            $statement->execute();

                            $id = $this->Connect->conn->lastInsertId();

                            $this->Connect->conn->exec("INSERT INTO supervisions_completed_has_staff_info VALUES($id," . $_SESSION['user'] . ")");

                        }


                        $statement->closeCursor();

                        // on_going supervisions
                        $statement = $this->Connect->conn->prepare("INSERT INTO  ongoing_supervision(student_fname,student_lname,research_title,start_year,nature_supervision,university_name,challenge_solution) VALUES (:a,
                                           :b,:c,:d,:e,
                                           :f, null)");
                        for ($i = 0; $i < sizeof($_POST['studentfname']); $i++) {
                            $statement->bindParam(':a', $_POST['studentfname'][$i]);
                            $statement->bindParam(':b', $_POST['studentlname'][$i]);
                            $statement->bindParam(':c', $_POST['researchtitle'][$i]);
                            $statement->bindParam(':d', $_POST['startyear'][$i]);
                            $statement->bindParam(':e', $_POST['naturesupervision'][$i]);
                            $statement->bindParam(':f', $_POST['university_name'][$i]);

                            $statement->execute();

                            $id = $this->Connect->conn->lastInsertId();
                            $this->Connect->conn->exec("INSERT INTO ongoing_supervision_has_staff_info VALUES($id," . $_SESSION['user'] . ")");

                        }


                        header("location: ../link_point/OutReaches.php");
                    } catch (PDOException $e) {
                        $this->Connect->CloseConnection();
                        echo "Something went wrong \n" . $e->getMessage();
                        echo '<script>alert("an error occurred")</script>';
                        return;
                    }



                } else if ($_POST['ongoing_sup'][0] == 'YES') {
                    try {
                        $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        echo 'connected successfully';

                        // on_going supervisions
                        $statement = $this->Connect->conn->prepare("INSERT INTO  ongoing_supervision(student_fname,student_lname,research_title,start_year,nature_supervision,university_name,challenge_solution) VALUES (:a,
                                           :b,:c,:d,:e,
                                           :f, null)");
                        for ($i = 0; $i < sizeof($_POST['studentfname']); $i++) {
                            $statement->bindParam(':a', $_POST['studentfname'][$i]);
                            $statement->bindParam(':b', $_POST['studentlname'][$i]);
                            $statement->bindParam(':c', $_POST['researchtitle'][$i]);
                            $statement->bindParam(':d', $_POST['startyear'][$i]);
                            $statement->bindParam(':e', $_POST['naturesupervision'][$i]);
                            $statement->bindParam(':f', $_POST['university_name'][$i]);

                            $statement->execute();

                            $id = $this->Connect->conn->lastInsertId();
                            $this->Connect->conn->exec("INSERT INTO ongoing_supervision_has_staff_info VALUES($id," . $_SESSION['user'] . ")");

                        }

                        header("location: ../link_point/OutReaches.php");

                    } catch (PDOException $e) {
                        $this->Connect->CloseConnection();
                        echo "Something went wrong \n" . $e->getMessage();
                        echo '<script>alert("an error occurred")</script>';
                        return;
                    }


                } else if ($_POST['comp_sup'][0] == 'YES') {

                    try {
                        $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        echo 'connected successfully';

                        // completed supervisions
                        $statement = $this->Connect->conn->prepare("INSERT INTO  supervisions_completed(student_fname,student_lname,research_title,start_year,completion_year,nature_supervision,awarding_university,challenge_solution) VALUES (:a,
                                               :b,:c,:d,:e,
                                               :f,:g, null)");

                        for ($i = 0; $i < sizeof($_POST['student_fname']); $i++) {
                            $statement->bindParam(':a', $_POST['student_fname'][$i]);
                            $statement->bindParam(':b', $_POST['student_lname'][$i]);
                            $statement->bindParam(':c', $_POST['research_title'][$i]);
                            $statement->bindParam(':d', $_POST['start_year'][$i]);
                            $statement->bindParam(':e', $_POST['completion_yea'][$i]);
                            $statement->bindParam(':f', $_POST['nature_supervision'][$i]);
                            $statement->bindParam(':g', $_POST['awarding_university'][$i]);
                            $statement->execute();

                            $id = $this->Connect->conn->lastInsertId();

                            $this->Connect->conn->exec("INSERT INTO supervisions_completed_has_staff_info VALUES($id," . $_SESSION['user'] . ")");

                        }

                        header("location: ../link_point/OutReaches.php");

                    } catch (PDOException $e) {
                        $this->Connect->CloseConnection();
                        echo "Something went wrong \n" . $e->getMessage();
                        echo '<script>alert("an error occurred")</script>';
                        return;
                    }

                }

            }
        }

          //////////////////////////////////////////////////////////////
         ///processing ranks of the university environment by a user///
        //////////////////////////////////////////////////////////////
        public function environment_ranking(): void{
            $category_section_num = 0;
            if(isset($_GET['submit'])){
                try{
                    $statement = $this->Connect->conn->prepare("INSERT INTO rank_research_teaching_env(category,item,qaulity,quantity,remarks) VALUES (:a,
                                               :b,:c,:d,:e)");
                    for ($i = 1; $i <= 6; $i++){
                        if ($i == 1){
                            $category_section_num = 9;
                        }else if ($i == 2){
                            $category_section_num = 6;
                        }else if ($i == 3){
                            $category_section_num = 10;
                        }else if ($i == 4){
                            $category_section_num = 4;
                        }else if ($i == 5){
                            $category_section_num = 5;
                        }else if ($i == 6){
                            $category_section_num = 7;
                        }

                        for ($j = 1; $j <= $category_section_num; $j++){
                            $statement->bindParam(':a',$_GET['cat'.$i]);
                            $statement->bindParam(':b',$_GET['cat'.$i.'item'.$j]);
                            $statement->bindParam(':c',$_GET['cat'.$i.'item'.$j.'Q']);
                            $statement->bindParam(':d',$_GET['cat'.$i.'item'.$j.'QL']);
                            $statement->bindParam(':e',$_GET['cat'.$i.'item'.$j.'RM']);

                            $statement->execute();
                            $id = $this->Connect->conn->lastInsertId();
                            $this->Connect->conn->exec("INSERT INTO rank_research_teaching_env_has_staff_info VALUES($id,".$_SESSION['user'].")");
                        }
                    }

                    header('location: /dash1.0/dashboard.php');

                }catch (PDOException $ec){
                    $this->Connect->CloseConnection();
                    echo $ec->getMessage();
                }

                $this->Connect->CloseConnection();
                exit();
            }
        }


        ///////////////////////////////////
        ///Generating user ids from php///
        /////////////////////////////////

        public function IdGenerator(): int{
            $today_date = date('Y');
            $rs = $this->getData("SELECT staff_id from staff_info ORDER BY staff_id DESC LIMIT 1");

            $gen = substr($rs[0]['staff_id'], 0,3);
            settype($rs[0]['staff_id'],'string');

            if ($gen == settype($today_date,"string")){
                return $rs[0]['staff_id'] + 1;
            }
            return $today_date."00001";
        }

    }

