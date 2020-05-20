<?php
    include('dbconnection.php');
    class BDZ_Database{

        public function db_insert($query_string){
            $query=mysqli_query($con,$query_string);

            if ($query) {
                return "Information Successfully Added";
            }
            else{
                return "Something Went Wrong. Please try again";
            }

        }

    
        public function db_select($query_string){

        }

        public function db_update($query_string){

        }

    }
?>