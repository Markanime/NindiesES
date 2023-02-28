<?php 
namespace routes;
use Database;
use templates;

class home {	
    private $path="";
    private $category="";

    function __construct($path="") {
        include __DIR__ .'/../../database/Database.php';
        include __DIR__ .'/../../templates/verti/Verti.php';
        if($path!=""){
            $this->path = $path;
            $this->category = $path;
        }
    }

    public function SetCategory($category){
        $this->category = $category;
    }

    public function Print(){  
        $template = new templates\Verti();   
        $db = new Database\Controller();

        $template->wiiuLinks = $db->Run("SELECT domain,name,studio,eshop,releasedate,platform FROM games WHERE platform='WiiU' order by releasedate ASC");
        $template->dsLinks = $db->Run("SELECT domain,name,studio,eshop,releasedate,platform FROM games WHERE platform='3DS' order by releasedate ASC");

        switch($this->path){
            case "wiiu":
                $template->title = "Juegos españoles para Nintendo Wii U - Nindies de España";
                $template->subTitle = "Registro Español de Wii U";
                $template->menuindex = 1;
                $template->PrintCatalog($template->wiiuLinks);
            break;
            case "3ds":
                $template->title = "Juegos españoles para Nintendo 3DS  - Nindies de España";
                $template->subTitle = "Registro Español de 3Ds";
                $template->menuindex = 2;
                $template->PrintCatalog($template->dsLinks);
            break;
            case "":
            case "home":
                $template->title = "Nindies de España - videojuegos indies Españoles para Nintendo WiiU y Nintendo 3DS";
                $template->subTitle = "Registro Español de 3DS & Wii U";
                $template->menuindex = 0;
                $template->PrintHome();
            break;
            default:
                $result = $db->Run("SELECT * FROM games g JOIN eshop e ON g.id = e.gameId WHERE g.domain = \"".$db->ParseWord($this->path)."\"");
                if (count($result) > 0)
                {
                    $template->PrintProduct($result[0]);
                }
            break;
        } 
    }
}
?>