<?php 

/**
 * Class PHPModular
 *
 * This is base class for project PhpModular. It has all function required for it
 *
 * @params
 */

class PHPModular{

	/** 
	 * @var $dom DOMDocument holding obj
	 *
	 */
	private $dom;

	/** 
	 * @var Paths to be use where module is situated 
	 */
	private $paths = [];

	/** 
	 * @var Current Nodes to be loaded 
	 */
	private $current = [];

	/** 
	 * @var Next Page Nodes to be loaded 
	 */
	private $next = [];

	/** 
	 * @var last Page Nodes loaded
	 */
	private $previus = [];

	/**
	 *----------------------------------------------------------
	 *
	 * Constructor
	 * Creating DomDocument Obj
	 *
	 *----------------------------------------------------------
	 */
	public function __construct(){
		$this->dom = new DOMDocument();
	}

	/**
	 *----------------------------------------------------------
	 *
	 * Function load
	 * Sets current nodes to be loaded
	 * @param String $node the node to added
	 * @param Array $vars parameters to be passed
	 *
	 *----------------------------------------------------------
	 */
	public function load($node, $vars){
		$files = [];
		# load all file paths from all paths array in array
		foreach($this->paths as $path){
			$f = scandir($path);
			foreach($f as $file){
				if($file != '.' && $file != '..'){
					array_push($files, $path.'/'.$file);
				}
			}
		}

		# now as all files are gathered let us include them
		foreach($files as $file){
			if(file_exists($file) and !is_dir($file)){
				include_once $file;
			}
		}

		#now search for node
		if( function_exists($node) ){
			# now extract properties if exists
			array_push($this->current, $node($vars));
		}
		else{
			die("Module with name {$node} not found!"); #throw if node not found
		}
		
	}

	/**
	 *----------------------------------------------------------
	 *
	 * Function unload
	 * Unset a current node
	 * @param String $node unsets from current tree
	 *
	 *----------------------------------------------------------
	 */
	public function unload($node){
		unset($this->current[$node]);
	}

	/**
	 *----------------------------------------------------------
	 *
	 * Function render
	 * Finally render all nodes
	 *
	 *----------------------------------------------------------
	 */
	public function render(){
		$_output = "";
		foreach($this->current as $node){
			$_output .= $node;
		}
		$this->dom->loadHTML($_output);
		echo $this->dom->saveHTML();
	}

	/**
	 *----------------------------------------------------------
	 *
	 * Function use
	 * Includes a path where modules are kept
	 * @param String $path adds module directory path to include
	 *
	 *----------------------------------------------------------
	 */
	public function use($path){
		if( is_dir($path) ){
			array_push($this->paths, $path);
		}
		else{
			die($path . ' Not Found!');
		}
	}

}

/**
 *----------------------------------------------------------
 *
 * Function debug
 * ? = Helper debugging function
 * @params - any
 *
 *----------------------------------------------------------
 */
if ( ! function_exists('debug') ){
	function debug($val){
		echo "<pre>";
		print_r($val);
		echo "</pre>";
	}
}