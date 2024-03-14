<?php
class Rating
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = "";
    private $database = "clinicappointment";
    private $ratingUsersTable = 'patient';
    private $productTable = 'treatment';	
    private $ratingTable = 'feedback';
    private $dbConnect = false;

    public function __construct()
    {
        $this->dbConnect = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->dbConnect->connect_error) {
            die("Error failed to connect to MySQL: " . $this->dbConnect->connect_error);
        }
    }

    private function getData($sqlQuery)
    {
        $result = $this->dbConnect->query($sqlQuery);
        if (!$result) {
            die('Error in query: ' . $this->dbConnect->error);
        }
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    private function getNumRows($sqlQuery)
    {
        $result = $this->dbConnect->query($sqlQuery);
        if (!$result) {
            die('Error in query: ' . $this->dbConnect->error);
        }
        $numRows = $result->num_rows;
        return $numRows;
    }

    public function userLogin($username, $password)
    {
        $username = $this->dbConnect->real_escape_string($username);
        $password = $this->dbConnect->real_escape_string($password);

        $sqlQuery = "SELECT * FROM " . $this->ratingUsersTable . " WHERE username='$username'";
        $result = $this->getData($sqlQuery);

        if ($result && password_verify($password, $result[0]['password'])) {
            return $result;
        } else {
            return false;
        }
    }

    public function getTreatment($treatmentId){
		$sqlQuery = "
			SELECT * FROM ".$this->productTable."
			WHERE id='".$treatmentId."'";
		return  $this->getData($sqlQuery);	
	}

    public function getProductRating()
    {
        $sqlQuery = "SELECT f.feedbackId, f.patientId, p.username, f.rating, f.feedback, f.dateTime
                     FROM " . $this->ratingTable . " as f
                     LEFT JOIN " . $this->ratingUsersTable . " as p ON (f.patientId = p.patientId) 
                     ";
        return $this->getData($sqlQuery);
    }

    public function getRatingAverage()
    {
        $itemRating = $this->getProductRating();
        $ratingSum = 0;
        $count = count($itemRating);

        foreach ($itemRating as $itemRatingDetails) {
            $ratingSum += $itemRatingDetails['rating'];
        }

        $average = ($count > 0) ? $ratingSum / $count : 0;
        return $average;
    }

    public function closeConnection()
    {
        $this->dbConnect->close();
    }
}

?>
