<?php

class View
{
	
	function generate($content_view, $template_view, $data = null)
	{
		

		include 'app/views/'.$template_view;
	}
	static public function printData($data)
    {
        print_r('<pre><p style="background-color: white; color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid;">');
        print_r($data);
        print_r('</p></pre>');
    }
}
