<?php
	class PaginationsAjax
	{
		public $perpage;
		
		function __construct()
		{
			$this->perpage = 1;
		}
		
		function getAllPageLinks($count, $href, $elShow)
		{
			$output = '';

			if(!isset($_GET["p"])) $_GET["p"] = 1;

			if($this->perpage != 0)
				$pages = ceil($count/$this->perpage);

			if($pages>1)
			{
				if($_GET["p"] == 1) 
					$output = $output . '<a class="prev disabled"> <i class="fas fa-angle-left"></i> </a>';
					// $output = $output . '<a class="first disabled">First</a><a class="prev disabled"> Prev </a>';
				else	
					$output = $output . '<a class="prev" onclick="loadPagingAjax(\'' . $href . ($_GET["p"]-1) . '\',\''.$elShow.'\')" > <i class="fas fa-angle-left"></i> </a>';
					// $output = $output . '<a class="first" onclick="loadPagingAjax(\'' . $href . (1) . '\',\''.$elShow.'\')" >First</a><a class="prev" onclick="loadPagingAjax(\'' . $href . ($_GET["p"]-1) . '\',\''.$elShow.'\')" >Prev</a>';
				
				if(($_GET["p"]-3)>0)
				{
					if($_GET["p"] == 1)
						$output = $output . '<a id=1 class="current">01</a>';
					else				
						$output = $output . '<a onclick="loadPagingAjax(\'' . $href . '1\',\''.$elShow.'\')" >01</a>';
				}
				if(($_GET["p"]-3)>1)
				{
					$output = $output . '<a class="dot">...</a>';
				}
				
				for($i=($_GET["p"]-2); $i<=($_GET["p"]+2); $i++)
				{
					if($i<1) continue;
					if($i>$pages) break;
					if($_GET["p"] == $i){
						if($i < 10){
							$output = $output . '<a id='.$i.' class="current">0'.$i.'</a>';
						}else{
							$output = $output . '<a id='.$i.' class="current">'.$i.'</a>';
						}
					}
					else{
						if($i < 10){
							$output = $output . '<a onclick="loadPagingAjax(\'' . $href . $i . '\',\''.$elShow.'\')" >0'.$i.'</a>';
						}else{
							$output = $output . '<a onclick="loadPagingAjax(\'' . $href . $i . '\',\''.$elShow.'\')" >'.$i.'</a>';
						}
					}			
						
				}
				
				if(($pages-($_GET["p"]+2))>1)
				{
					$output = $output . '<a class="dot">...</a>';
				}
				if(($pages-($_GET["p"]+2))>0)
				{
					if($_GET["p"] == $pages){
						if($i < 10){
							$output = $output . '<a id=' . ($pages) .' class="current">0' . ($pages) .'</a>';
						}else{
							$output = $output . '<a id=' . ($pages) .' class="current">' . ($pages) .'</a>';
						}
					}
						
					else{
						if($i < 10){
							$output = $output . '<a onclick="loadPagingAjax(\'' . $href .  ($pages) .'\',\''.$elShow.'\')" >0' . ($pages) .'</a>';
						}else{
							$output = $output . '<a onclick="loadPagingAjax(\'' . $href .  ($pages) .'\',\''.$elShow.'\')" >' . ($pages) .'</a>';
						}
						}
				}
				
				if($_GET["p"] < $pages)
					$output = $output . '<a class="next" onclick="loadPagingAjax(\'' . $href . ($_GET["p"]+1) . '\',\''.$elShow.'\')" ><i class="fas fa-angle-right"></i></a>';
					// $output = $output . '<a class="next" onclick="loadPagingAjax(\'' . $href . ($_GET["p"]+1) . '\',\''.$elShow.'\')" >Next</a><a class="last" onclick="loadPagingAjax(\'' . $href . ($pages) . '\',\''.$elShow.'\')" >Last</a>';
				else				
					$output = $output . '<a class="next disabled"><i class="fas fa-angle-right"></i></a>';
					// $output = $output . '<a class="next disabled">Next</a><a class="last disabled">Last</a>';
			}

			return $output;
		}

		function getPrevNext($count, $href, $elShow)
		{
			$output = '';

			if(!isset($_GET["p"])) $_GET["p"] = 1;

			if($this->perpage != 0)
				$pages  = ceil($count/$this->perpage);

			if($pages>1)
			{
				if($_GET["p"] == 1) 
					$output = $output . '<a class="prev disabled">Prev</a>';
				else	
					$output = $output . '<a class="prev" onclick="loadPagingAjax(\'' . $href . ($_GET["p"]-1) . '\',\''.$elShow.'\')" >Prev</a>';			
			
				if($_GET["p"] < $pages)
					$output = $output . '<a class="next" onclick="loadPagingAjax(\'' . $href . ($_GET["p"]+1) . '\',\''.$elShow.'\')" >Next</a>';
				else				
					$output = $output . '<a class="next disabled">Next</a>';
			}

			return $output;
		}
	}
?>