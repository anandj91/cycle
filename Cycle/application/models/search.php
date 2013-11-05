<?php

class Search extends CI_Model {	

	public function getResult($cycle) {
		// creating query
		$select_query = 'SELECT * FROM cycles where cycle like "' . $cycle . '"';
		
		// running query
		$res = $this->db->query($select_query);
		
		if ($res->num_rows() > 0) {
			// if cycle exist return the results
			
			// returning result
			return $res->row_array();
			
		} else {
			// if cycle does not exist add new cycle to the table and calculate next turn

			// next person to wash vessels
			$paathram = Search::getNextPaathram($cycle);
			// next person to clean table	
			$mesha = Search::getNextMesha($cycle);
			
			// entry array
			$entry = array(	'cycle' => "'".$cycle."'",
							'paathram' => $paathram,
							'mesha' => $mesha,
							'first_paathram' => $paathram,
							'first_mesha' => $mesha);
			
			// insert into db
			Search::insert($entry);
			
			// returning result
			return $entry;
		}
		
	}
	
	/*
	 * $entry should be of the format
	 * 
	 * 		$entry = array(	'cycle' => "$cycle",
	 * 						'paathram' => $paathram,
	 * 						'mesha' => $mesha,
	 * 						'first_paathram' => $first_paathram,
	 * 						'first_mesha' => $first_mesha); 
	 */
	private function insert($entry) {
		// query to insert new cycle to db
		$insert_query = 'INSERT INTO cycles VALUES('.(implode(",", $entry)) .')';
			
		// inserting cycle to db
		$insert_result = $this->db->query($insert_query);
		
	}
	
	/*
	 * find the person to clean paathram for a new cycle
	 */
	public function getNextPaathram($cycle) {
		
		// query to get next person to clean paathram for a new cycle
		$next_paathram_query = 'SELECT m.id, s.* 
								FROM (select * from members where id IN ('.$cycle.')) m
								LEFT OUTER JOIN 
									(SELECT first_paathram f, COUNT( first_paathram ) c
										FROM cycles
										GROUP BY first_paathram
									) s ON m.id = s.f
								ORDER BY s.c
								LIMIT 1';
		
		$next_paathram_result = $this->db->query($next_paathram_query);
		
		$row = $next_paathram_result->row_array();
		
		return $row['id'];
		
	}
	
	/*
	 * find the person to clean mesha for a new cycle
	 */
	public function getNextMesha($cycle) {
		
		// query to get next person to clean paathram for a new cycle
		$next_mesha_query = 'SELECT m.id, s.*
								FROM (select * from members where id IN ('.$cycle.')) m
								LEFT OUTER JOIN
									(SELECT first_mesha f, COUNT( first_mesha ) c
										FROM cycles
										GROUP BY first_mesha
									) s ON m.id = s.f
								ORDER BY s.c
								LIMIT 1';
		
		$next_mesha_result = $this->db->query($next_mesha_query);
		
		$row = $next_mesha_result->row_array();
		
		return $row['id'];
	}
}

?>