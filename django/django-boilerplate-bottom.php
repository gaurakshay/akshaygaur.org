  <!-- Footer Start -->
  <?php include '../footer.html';?>
  <!-- Footer End -->
  <!-- ===============================JS ================================ -->
  <script src="../js/prism-tn.js"></script>
  <script src="../js/prism-treeview.js"></script>
  <script>
          let a = document.querySelector('a[href*="???.php"]');
          let par = a.parentElement;
          par.setAttribute('class', 'active');
          let chevronRight = '<svg class="page-next" viewBox="0 0 256 512"><path d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>';
          let chevronLeft = '<svg class="page-prev" viewBox="0 0 256 512"><path d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path></svg>';
          let url = window.location.href;
          let currFile = (url.substring(url.lastIndexOf('/')+1));
          let pageNumber = parseInt(currFile.substring(currFile.lastIndexOf('-')+1, 9));
          // console.log(pageNumber);
          // if (currFile === "index.php" || currFile === "") {
          //   let nextPage = "django-02.php"
          //   let link = '<a href="./' + nextPage + '">'+chevronRight+"</a>"
          //   let range = document.createRange();
          //   range.selectNode(document.getElementsByTagName("main").item(0));
          //   let docFragment = range.createContextualFragment(link);
          //   document.body.appendChild(docFragment);
          // }
          let nextLink = '';
          let prevLink = '';
          if(isNaN(pageNumber)){
            nextLink = '<a href="./django-02.php">' + chevronRight + '</a>';
          } else if (pageNumber == 2) {
            nextLink =  '<a href="./django-' + (pageNumber + 1).toString().padStart(2, '0') + '.php">' + chevronRight + '</a>';
            prevLink =  '<a href="./index.php">' + chevronLeft + '</a>';
          } else if (pageNumber < 11) {
            nextLink =  '<a href="./django-' + (pageNumber + 1).toString().padStart(2, '0') + '.php">' + chevronRight + '</a>';
            prevLink =  '<a href="./django-' + (pageNumber - 1).toString().padStart(2, '0') + '.php">' + chevronLeft + '</a>';
          } else if (pageNumber == 11) {
            prevLink =  '<a href="./django-' + (pageNumber - 1).toString().padStart(2, '0') + '.php">' + chevronLeft + '</a>';
          }

          // console.log(nextLink);
          // console.log(prevLink);

          let range = document.createRange();
          range.selectNode(document.getElementsByTagName("main").item(0));
          if(prevLink != '') {
            document.body.appendChild(range.createContextualFragment(prevLink));
          }
          if(nextLink != '') {
            document.body.appendChild(range.createContextualFragment(nextLink));
          }

  </script>
</body>
</html>