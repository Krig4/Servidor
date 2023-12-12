<?php
    function InsertStudent($conn, $firstname, $lastname, $age)
    {
        try {
            $sql = "INSERT INTO student(firstname, lastname, age)
            VALUES ('$firstname', '$lastname', '$age')";
            // use exec() because no results are returned
            $conn->exec($sql);
            return $firstname." ha sido añadido correctamente";
        } catch(PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
        }
    }

    function InsertStudentId($conn, $id, $firstname, $lastname, $age)
    {
        try {
            $sql = "INSERT INTO student(firstname, lastname, age)
            VALUES ('$firstname', '$lastname', '$age')";
            // use exec() because no results are returned
            $conn->exec($sql);
            return $firstname." ha sido añadido correctamente";
        } catch(PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
        }
    }

    function SelectStudent($conn, $tag, $value){
        try {
            $sql = "SELECT * FROM student WHERE $tag like '$value'";
            // use exec() because no results are returned
            return $conn->query($sql);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    function SelectAllStudent($conn){
        try {
            $sql = "SELECT * FROM student";
            // use exec() because no results are returned
            return $conn->query($sql);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
?>