<?php 

require_once PRESENTATION_DIR . 'content.php';

class Task
{
	public $mId = 0;
	public $mTask = '';
	
	public function __construct($id, $task)
	{
		$this->mId = $id;
		$this->mTask = $task;
	}
	
	public function getContent($result = '') {
		
		return $this->task($result);
		
	}
	
	private function task($result) {
		
		$task_tpl = TEMPLATE_DIR. '/task.tpl';
		$data = file_get_contents($task_tpl);
		
		
		$data = str_replace('{{TASKID}}', $this->mId, $data);
		$data = str_replace('{{TASK}}', $this->mTask, $data);
		$data = str_replace('{{CONTENT}}', $result, $data);
		
		return $data;
		
	}
}

?>
