<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Documentation</title>
	  <link rel="stylesheet" href="dist/app.css">
  </head>
  <body>
	  <div class="standard-page" id="app">
  		<?php include('html-includes/navigation.html'); ?>
      <section class="landing__banner-bar">
        <div class="container">
          <h1>Media</h1>
          <ol class="breadcrumb">
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="#">Media</a>
            </li>
          </ol>
        </div>
      </section>

      <section>
        <div class="standard-content">
  				<table width="100%">
            <tbody>
              <tr>
                <th>
                  Document
                </th>
                <th>
                  Download(s)
                </th>
              </tr>
                
              <tr>
                <?php
                    $json_string = file_get_contents("./assets/media-list.json");
                    $json = json_decode($json_string, true);

                    foreach ($json as $documentName => $filePaths) {
                      echo '<tr><td>'.$documentName.'</td><td>';

                      foreach ($filePaths['filePaths'] as $filePath) {

                        $fileType = substr(strrchr($filePath,'.'),1);

                        $iconArr = array(
                                        "pdf" => "fa fa-file-pdf-o",
                                        "doc" => "fa fa-file-word-o",
                                        "docx" => "fa fa-file-word-o"
                                      );

                        echo '<a href="'.$filePath.'"><i class="'.$iconArr[$fileType].'"></i></a>';
                      }

                      echo '</td></tr>';
                    }
                ?>
                
              </tr>

            </tbody>
          </table>
        </div>
      </section>

  		<?php include('html-includes/footer.html'); ?>
	  </div>
	  <!-- Scripts -->
	  <script src="dist/app.js"></script>
  </body>
</html>
