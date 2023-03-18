<?php
    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysql_connect_error());
        exit();
    }

    printf("<h1>Pracownicy</h1>");
    $psql = "SELECT nazwisko, etat FROM pracownicy WHERE id_prac = ?";

    /*
        Create a prepared statement.
    */
    $pstmt = mysqli_stmt_init($link);       
    
    /* 
        Prepare an SQL statement for execution, you can use parameter markers ("?")
        in this query, specify values for them, and execute it later.
    */
    mysqli_stmt_prepare($pstmt, $psql);    

    for ($i=100;$i<230;$i+=10)
    {
        /*
            This function is used to bind variables to the parameter markers
            of prepared statement:
            mysqli_stmt_bind_param($stmt, $types, $var1, $var2...);
            types:
            i - integer type
            d - double type
            s - string type
            b - blob type
        */
        mysqli_stmt_bind_param($pstmt,"i",$i);

        /*
            Accepts a prepared statement object as a parameter and executes it.
        */
        mysqli_stmt_execute($pstmt);

        /*
            Bind the columns of a result set to variables.
            After binding variable, you need to invoke the mysqli_stmt_fetch()
            to get the values of the columns in the specific variables.
        */
        mysqli_stmt_bind_result($pstmt,$nazwisko,$etat);
        mysqli_stmt_fetch($pstmt);

        printf("$nazwisko pracuje jako $etat <br/>");
    }
    /*
        Closes the statement.
    */
    mysqli_stmt_close($pstmt);
    mysqli_close($link);
?>