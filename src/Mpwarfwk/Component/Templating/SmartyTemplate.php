<?php

namespace Mpwarfwk\Component\Templating;

use Mpwarfwk\Component\Templating\iTemplating;


class SmartyTemplate implements iTemplating
{
	public function __construct()
	{
		$this->view = new \Smarty();
	}

	public function renderTemplate($template, $variables = null)
	{
		return $this->view->fetch($template);
	}

	public function assignVars($variables)
	{
		foreach ($variables as $key => $value)
		{
		$this->view->assign($key,$value);
		}
	}
}