<?php

    include '../config/config.php';

    $query = '';

    $output = array();
    # code...
    $query .= "SELECT u.*, a.access_level UserAccess FROM users u
    INNER JOIN access_level a on u.access_level = a.id  
    WHERE u.status = 1
    AND ";

    if(isset($_POST["search"]["value"]))
    {
        $query .= ' (u.first_name LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR u.last_name LIKE "%'.$_POST["search"]["value"].'%" ';
        // $query .= 'OR a.access_level LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR u.dob LIKE "%'.$_POST["search"]["value"].'%" ) ';
    }

    if(isset($_POST["order"]))
    {
        $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY u.id DESC ';
    }

    if($_POST["length"] != -1)
    {
        $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    // echo $query;
    // die;
    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $data = array();

    $filtered_rows = $statement->rowCount();

    foreach($result as $row)
    {
        $status = '';
        if($row["status"]>0)
        {
            $status = '<td class="text-center"><span class="badge badge-success">Active</span></td>';
        }
        else
        {
            $status = '<td class="text-center"><span class="badge badge-danger">Not Active</span></td>';
        }
        $sub_array = array();
        $approve = '';
        if ($row['status']>0) 
        {
            # code...
            $approve = '<a class="dropdown-item approve" href="#" id="'.$row['id'].'" value="'.$row['status'].'">Dispprove</a>';
        }
        else
        {
            $approve = '<a class="dropdown-item approve" href="#" id="'.$row['id'].'" value="'.$row['status'].'">Approve</a>';
        }

        $sub_array[] = $row['id'];
        $sub_array[] = $row['first_name'];
        $sub_array[] = $row['last_name'];
        $sub_array[] = $row['dob'];
        $sub_array[] = $row['UserAccess'];
        $sub_array[] = $status;
               
        $data[] = $sub_array;
    }

    $output = array(
        "draw"              =>  intval($_POST["draw"]),
        "recordsTotal"      =>  $filtered_rows,
        "recordsFiltered"   =>  get_total_all_records($connect),
        "data"              =>  $data
    );
    echo json_encode($output);

    function get_total_all_records($connect)
    {
        $statement = $connect->prepare("SELECT * FROM users WHERE AND status = 1");
        $statement->execute();
        return $statement->rowCount();
    }
?>