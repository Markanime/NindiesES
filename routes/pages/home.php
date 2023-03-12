<?php 
namespace routes;
use Database;
use templates;
use languages; 

class home {	
    private $path="";
    private $category="";
    private $lang;

    function __construct($path="") {
        include __DIR__ .'/../../database/Database.php';
        include __DIR__ .'/../../templates/verti/Verti.php';
        include __DIR__ .'/../../languages/es.php';

        if($path!=""){
            $this->path = $path;
            $this->category = $path;
        }

        $this->lang = new languages\Es();
    }

    public function SetCategory($category){
        $this->category = $category;
    }

    public function Print(){  
        $lang = $this->lang;
        $template = new templates\Verti($lang);   
        $db = new Database\Controller();

        $template->wiiuLinks = $db->Run("SELECT domain,name,studio,eshop,releasedate,platform FROM games WHERE platform='WiiU' order by releasedate ASC");
        $template->dsLinks = $db->Run("SELECT domain,name,studio,eshop,releasedate,platform FROM games WHERE platform='3DS' order by releasedate ASC");

        switch($this->path){
            case "wiiu":
                $template->title =  $lang->HOME_WIIU_TITLE;
                $template->subTitle = $lang->HOME_WIIU_SUBTITLE;
                $template->menuindex = 1;
                $template->PrintCatalog($template->wiiuLinks);
            break;
            case "3ds":
                $template->title = $lang->HOME_3DS_TITLE;
                $template->subTitle = $lang->HOME_3DS_SUBTITLE;
                $template->menuindex = 2;
                $template->PrintCatalog($template->dsLinks);
            break;
            case "":
            case "home":
                $template->title = $lang->HOME_TITLE;
                $template->subTitle = $lang->HOME_SUBTITLE;
                $template->menuindex = 0;
                $template->PrintHome();
            break;
            default:
                $result = $db->Run("SELECT * FROM games g JOIN eshop e ON g.id = e.gameId WHERE g.domain = \"".$db->ParseWord($this->path)."\"");
                if (count($result) > 0)
                {
                    $stores = $db->Run("SELECT label,url FROM stores WHERE gameId = ".$result[0]['gameId']);
                    $template->PrintProduct($result[0],$stores);
                }
            break;
        } 
    }
}
?>