
  // google.load("jquery", "1.3.2");
  // google.load("jqueryui", "1.7.2");

    
  function send()
  {
    //Считываем сообщение из поля ввода с id mess_to_add
    var mess = $("#mess_to_send").val();
    // Отсылаем паметры
       $.ajax({
                type: "POST",
                url: "add_mess.php",
                data:"mess=" + mess,
                // Выводим то что вернул PHP
                success: function(html)
        {
          //Если все успешно, загружаем сообщения
          load_messes();
          //Очищаем форму ввода сообщения
          $("#mess_to_send").val('');
                }
        });
  }
  

    //Функция загрузки сообщений
  function load_messes()
  {
    
    $.ajax({
      
      
                type: "POST",
                url:  "load_messes.php",
                data: "req=ok",
                // Выводим то что вернул PHP
                success: function(html)
        {
          //Очищаем форму ввода
          $("#messages").empty();
          //event.preventDefault();
          //Выводим что вернул нам php
          $("#messages").append(html);
          //Прокручиваем блок вниз(если сообщений много)
          $("#messages").scrollTop(900000);
                }
        });
  }


load_messes();
setInterval(load_messes, 1000);

