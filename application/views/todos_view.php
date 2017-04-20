  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  	<title>TODOs</title>

  	<!-- Bootstrap -->
  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body>

      <section class="container">
        <h3>TODOs</h3>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="">Status</th>
                <th>Task</th>
                <th>Action</th>
              </tr>
              <tr>
                <td class=""></td>
                <td><input type="text" name="task" class="form-group form-control input-task"></td>
                <td><button class="btn btn-primary add-task">Add</button></td>
              </tr>
            </thead>
            <tbody class="todo-list"></tbody>
          </table>
        </div>
      </section>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/underscore-min.js"></script>
  <script type="text/javascript" src="js/backbone-min.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
  <script type="text/template" class="todoView">
    <td><input type="checkbox" name="task-status" class="form-group status" <%= ( status != "0" )? "checked":"" %>></td>
    <td><p class="task <%= ( status != "0" )? 'complete': 'ncomplete' %>"><%= task %></p></td>
    <td>
      <button class="btn btn-primary btn-edit">Edit</button>
      <button class="btn btn-danger btn-delete">Delete</button>
      <button class="btn btn-success btn-update" style="display: none">Update</button>
      <button class="btn btn-warning btn-cancel" style="display: none">Cancel</button>
    </td>
  </script>
  </body>
  </html>