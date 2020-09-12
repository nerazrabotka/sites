# Установка:
`docker-compose up`

в файлике DbConnect.php надо прописать свой белый ip в 
`private $host = '45.143.94.xx';`

### Эксплуатация xss:
`1111111111111111111111111111111111111111111111111<script>alert(1)</script>`

### Патч:
`strip_tags` — Удаляет теги HTML и PHP из строки

```
$name = $_POST['name'];
$post = $_POST['post'];
```

преобразовать в 

```
$name = strip_tags($_POST['name']);
$post = strip_tags($_POST['post']);
```
