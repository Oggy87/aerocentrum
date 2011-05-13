<?php
class Front_FeedPresenter extends Front_BasePresenter {
	
	protected function startup() {
		parent::startup();
		$this->absoluteUrls = TRUE;
	}
	
	public function renderSitemap() {
		$this->template->items = array();
		foreach (glob(APP_DIR . "/FrontModule/templates/*.latte") as $template) {
			$template = str_replace(".", ":", basename($template, ".latte"));
			if (!preg_match('~@|^Error:|^Feed:~', $template)) {
				$items = array();
				switch ($template) {
					case "Article:default": $items = BaseModel::fetchAll('article'); break;
					case "Players:player": $items = PlayersModel::fetchSitemap();
                                        case "Sign:in": break;
					default: $this->template->items[] = array("loc" => $this->link($template));
				}
				foreach ($items as $id => $val) {
					$this->template->items[] = array("loc" => $this->link($template, $id));
				}
			}
		}
	}
	
}
