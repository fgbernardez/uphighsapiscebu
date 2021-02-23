<?php

// 200 - Success
// 201 - created
// 203 - warning / exist
// 204 - error

    class HistoryModel extends CI_Model{

        public function getAllHistory()
        {
            return $this->db->order_by( "history_id", "DESC" )->get( "history" );
        }

        public function getAllHistoryWithParam( $per_page, $segment )
        {
            return $this->db->order_by( "history_id", "DESC" )->get( "history", $per_page, $segment );
        }
            
    }
?>
