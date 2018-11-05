<?php


class Bookings{
	
        function getVacancyInfo($conn, $id){
            $query = "SELECT id,numberofrooms,occupied  FROM products WHERE id = ?"; 
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $id);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_array();

            return $row;
        }
    
	function checkBooked($conn, $user_id){
            $query = "SELECT * FROM booking WHERE user_id = ?"; 
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $user_id);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_array();

            return $row;
	}
        
        function delBooking($conn, $data){
            $bookingid = $data['bookingid'];
            
            $query = "DELETE FROM booking WHERE bookingid = ?"; 
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $bookingid);

            if($stmt->execute()){
                return $this->decrementBooking($conn, $data);
            }
            return false;
        }
        
        function decrementBooking($conn, $data){
            $id = $data['id']; $num = $data['num']; $occupied = $data['occupied'];
            
            $occupied-=1;
            $vacant = $num - $occupied; 
            
            $query = "UPDATE `products` SET `occupied`= ?,`vacant`= ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sss', $occupied, $vacant, $id);

            return $stmt->execute();
        }

        function incrementBooking($conn,$data){
            $id = $data['id']; $num = $data['numberofrooms']; $occupied = $data['occupied'];
            
            $occupied+=1;
            $vacant = $num - $occupied; 
            
            $query = "UPDATE `products` SET `occupied`= ?,`vacant`= ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sss', $occupied, $vacant, $id);
            $stmt->execute();
        }
}