# nahima_toumi_poo
exam poo mvc
### Les méthodes magiques
## __construct(): Cette méthode magique est automatiquement appelée lors de l'instanciation d'un nouvel objet. Elle est utilisée pour initialiser les propriétés de l'objet.
# exemple 
```php
class Car {
   private $id;
   private $name;
   private $brand;
   private $model;
   private $energy;
   private $automatic;
   private $image;

   public function __construct($id,$name,$brand,$model,$energy,$automatic,$image)
   {
    $this->id= $id;
    $this->name= $name;
    $this->brand =$brand;
    $this->model = $model;
    $this->energy = $energy;
    $this->automatic = $automatic;
    $this->image = $image;
    
   }}
   ```
   ## __sleep(): Cette méthode magique est appelée avant la sérialisation de l'objet. Elle doit retourner un tableau contenant les noms des propriétés de l'objet qui doivent être sérialisées.
   # exemple 
   ```php
   class Pokemon{
    private $name;
    private $style;

    public function __construct($name, $style) {
        $this->name = $name;
        $this->style = $style;
    }

    public function __sleep() {
        return ['name', 'style'];
    }
}

$person = new Pokemon("Pikachu","foudre");
$serialized = serialize($pokemon);
```
## __toString()est utilisée pour définir comment sera représenter un objet sous forme de chaîne de caractères . Elle est appelée automatiquement lorsqu'on essaye d'afficher un objet en tant que chaîne de caractères, par exemple avec echo.
# exemple
```php
class Pokemon{
    private $name;
    private $style;
    public function __toString() {
        return "Pokemon: {$this->name}, Style: {$this->style}";
    }
    $pokemon  =new Pokemon ("Pikachu", "Foudre");
    echo $pokemon; //renverra Pokemon : Pikachu, Style : Foudre;
}

```

## __wakeup(): Cette méthode magique est appelée lors de la désérialisation de l'objet.On peut effectuer des modifications après la désérialisation comme modifier des attributs.
```php
class Pokemon{
    private $name;
    private $style;
    public function __wakeup() {
        $this->name = "Raichu";
    }
     $pokemon  =new Pokemon ("Pikachu", "Foudre");
     $pokemon =  unserialize(serialize($pokemon)); // normalement le name c'est Raichu;
 
}

```
## __set() cette méthode se déclenche quand on essaye d'assigner une valeur à une propriété inaccessible ou inexistante d'un objet. Par conséquent au lieu de nous renvoyer une erreur, si on modifie son comportement on peut effectuer des changements
# ex pour transformer une SESSION  
```php
class SessionManager {
    private $user;

   
public function __construct() {
        session_start();
        $this->user = $_SESSION;
    }

    public function __set($name, $value) {
        $this->user[$name] = $value;
        $_SESSION[$name] = $value;
    }

    public function __get($name) {
        return $this->user[$name];//deux méthodes magiques pour le prix d'une ;)
    }
    $session = new SessionManager();

$session->username = 'john_smith';


}
```
# SessionManager est utilisé pour transformer les variables de session en un objet. Le set permet de stocker la variable dans la session et le get montre comment accéder à cette valeur (en gros en considérant que c'est un objet). Corriger moi si je me trompe! merci