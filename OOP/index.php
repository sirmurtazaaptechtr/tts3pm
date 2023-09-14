<?php
    require('Employee.php');

    $emp1 = new PartTimeEmployee;
    $emp2 = new FullTimeEmployee;
    $emp3 = new Employee;
    $emp4 = new FullTimeEmployee;

    $emp1->set_id(1);
    $emp1->set_name("Fatima Zehra");
    $emp1->set_gender("Female");
    $emp1->set_age(20);
    $emp1->set_hourlyrate(65);

    $emp1->disp_employee();

    $emp2->set_id(2);
    $emp2->set_name("Husnain");
    $emp2->set_gender("Male");
    $emp2->set_age(19);
    $emp2->set_monthlysalary(3500);

    $emp2->disp_employee();

    $emp3->set_id(5);
    $emp3->set_name("Yaseen");
    $emp3->set_gender("Male");
    $emp3->set_age(19);   

    $emp3->disp_employee();

    $emp4->set_id(7);
    $emp4->set_name("Shayan");
    $emp4->set_gender("Male");
    $emp4->set_age(21);   
    $emp4->set_monthlysalary(4500);

    $emp4->disp_employee();