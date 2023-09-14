<?php
    class Employee {
        // Properties
        public $_id;
        public $_name;
        public $_gender;
        public $_age;

        // Methods
        function set_id($id)  {
            $this->_id = $id;                       
        }
        function get_id() {
            return $this->_id;            
        }
        function set_name($name)  {
            $this->_name = $name;                       
        }
        function get_name() {
            return $this->_name;            
        }
        function set_gender($gender)  {
            $this->_gender = $gender;                       
        }
        function get_gender() {
            return $this->_gender;            
        }
        function set_age($age)  {
            $this->_age = $age;                       
        }
        function get_age() {
            return $this->_age;            
        }
        function disp_employee() {
            echo "<p>
                    ID : $this->_id<br>
                    Name : $this->_name<br>
                    Gender : $this->_gender<br>
                    Age : $this->_age<br>
                </p>";
        }
    }
    class PartTimeEmployee extends Employee {
        public $_hourlyrate;

        function set_hourlyrate($salary)  {
            $this->_hourlyrate = $salary;                       
        }
        function get_hourlyrate() {
            return $this->_age;            
        }
        function disp_employee() {
            echo "<p>
                    ID : $this->_id<br>
                    Name : $this->_name<br>
                    Gender : $this->_gender<br>
                    Age : $this->_age<br>
                    Hourly Rate : $this->_hourlyrate<br>
                </p>";
        }
    }
    class FullTimeEmployee extends Employee {
        public $_monthlysalary;

        function set_monthlysalary($salary)  {
            $this->_monthlysalary = $salary;                       
        }
        function get_monthlysalary() {
            return $this->_age;            
        }
        function disp_employee() {
            echo "<p>
                    ID : $this->_id<br>
                    Name : $this->_name<br>
                    Gender : $this->_gender<br>
                    Age : $this->_age<br>
                    Monthly Salary : $this->_monthlysalary<br>
                </p>";
        }
    }
?>