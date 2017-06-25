<?php 
class Course implements ISavable {

	public $id;
	public $name;
	public $length;
	public $pic;
	public $description;
 
	function __construct($id, $name, $length,$pic, $description) {
		$this->id = $id;
		$this->name = $name;
		$this->length = $length;
		$this->pic = $pic;	
		$this->description = $description;
	}

		public function save() {

        $stmt = DB::getconnection()->prepare("INSERT INTO courses (id, name, length, img, description)
            VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param('ssiss',  $this->id, $this->name, $this->length, $this->pic, $this->description);
		$stmt->execute();
 
	}

}