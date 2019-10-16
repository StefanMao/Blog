<?php 

    class Entry {

        private $id;
        private $date;
        private $content;
        private $author;
        private $title;
        private $excerpt;
        private $dbh;
        private $error;

    

    public  function _construct(){ 
        #connect database
        
        $this->$dbh= new PDO("mysql:dbname=blog;host=localhost;",root,'5566');
     }

    public function creatNew(){

        $this->setByParams( -1, date("d.m.Y h:m"), $author, $title, $excerpt, $content);
     }
    public function creatNewformPOST( $post ){

        $this->creatNew(

            $post['entry_author'],
            $post['entry_title'],
            $post['entry_excerpt'],
            $post['entry_content']
        );

     }
    
    public function setByParams( $id , $content, $title, $excerpt ,$author){

        $this->id =$id;
        $this->author =$author;
        $this->title =$title;
        $this->content=$content;
        $this->excerpt=$excerpt;

     }

    public function setByRow ($Row){

        $this->setByParams(
            $row['entry_id'],
            $row['entry_date'],
            $row['entry_author'],
            $row['entry_excrept'],
            $row['entry_title'],
            $row['entry_content']

        );

     }

    public function sqlInsertEntry(){

        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query='INSERT INTO entrys ( entry_author, entry_date, entry_excerpt, entry_title,entry_content)
        VALUES(:entry_author, :entry_date, :entry_excerpt, :entry_title,:entry_content);';

        $stmt=$this->dbh->prepare($query);
        
        $result=$stmt->excute(array(
            ':entry_author' => $this->author,
            ':entry_date' => $this->date,
            ':entry_excerpt' => $this->excerpt,
            ':entry_title' => $this->title,
            ':entry_content' => $this->content
        ));


        $this->error=$this->dbh->errorInfo();
        print_r($this->error);



        $query = '  SELECT entry_id 
                    FROM entries 
                    WHERE entry_author= :entry_author 
                    ORDER BY entry_id 
                    DESC LIMIT 1;';
        
        $stmt = $this->dbh->prepare($query);
        $stmt->execute(array(
            ':entry_author' => $this->author
        ));
        $this->error = $this->dbh->errorInfo();
        print_r($this->error);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($row);
        $this->id = $row['entry_id'];
        
        return $result;

     }

    public function sqlSelectById($post_id){

        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT * FROM entries WHERE entry_id= :entry_id;';
        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_id' => $entry_id
        ));
        $this->error = $this->dbh->errorInfo();
        //print_r($this->error);
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setByRow($entry);
        //print_r($entry);
        return $result;


    }

    public function sqlUpdateById($post_id){

        $query = '  UPDATE entries SET 
            entry_author = :entry_author, 
            entry_title = :entry_title, 
            entry_content = :entry_content, 
            entry_excerpt = :entry_excerpt 
            WHERE entry_id = :entry_id;';
            
        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_author' => $this->author,
            ':entry_date' => $this->date,
            ':entry_excerpt' => $this->excerpt,
            ':entry_title' => $this->title,
            ':entry_content' => $this->content
        ));
        return $result;

     }

    private function vaildateString(){

    }

//============================
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    /**
     * Get the value of excerpt
     */ 
    public function getExcerpt()
    {
        return $this->excerpt;
    }
    /**
     * Set the value of excerpt
     *
     * @return  self
     */ 
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;
        return $this;
    }
    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}

?>