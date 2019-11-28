# Blog
建立具有發文功能及會員登入的個人網誌

## 使用程式語言或工具
1.HTML
2.CSS
3.PHP
4.MySQL
5.Apache

## 檔案內容說明

●Classes :  
  1.dbh.php :執行 連接資料庫 MySQL 等相關動作  
  2.entry.php :定義每篇文章新增時候所需要的參數及Function，傳遞文章的所有參數及載入及將資料MSQL等動作。  
  3.login.php:負責管理者登入資料的讀取(管理者相關資料)  
  
●includes :    
  1.header.php :載入首頁 Bootstrap Navnar  
  2.footer.php :  

●Create.php :文章撰寫頁面  
●index.php :主頁面，從MySql 載入所有文章  
●login.html:管理者登入頁面  
●single.php:單頁文章顯示頁面  
  
●asset:  
存放所需要的css 及 js檔案  

 
## 執行畫面

### 1.後端登入頁面
![alt tag](http://imgur.com/krx0zdZ.jpg)


### 2.撰寫文章頁面

只有成功登入，才會顯示撰寫文章的頁面

![alt tag](http://imgur.com/CuS6KBU.jpg)

### 3.顯示文章頁面

![alt tag](http://imgur.com/tRbCri0.jpg)

### 4.Mysql
DBname : blog

DBtable :entry
![alt tag](http://imgur.com/nnOOcWB.jpg)

DBtable :user
![alt tag](http://imgur.com/r1CZ1WT.jpg)








