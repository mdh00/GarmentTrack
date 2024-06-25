<?php
//Linking the config file
include "config/DBconnection.php";
//Linking header
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FAQs</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .container-faq {
      min-height: 100vh;
      max-width: 60%;
      margin: 0 auto;
      padding: 10px;
      padding-top: 5%;
    }

    .faq {
      padding: 10px;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.25);
    }

    .faq__title {
      font-size: 20px;
      text-transform: uppercase;
      color: #8b7197;
    }

    .faq__subtitle {
      font-size: 20px;
    }

    .faq__question {
      margin: 5px;
      background-color: #bba8c1;
      border-radius: 10px;
      cursor: pointer;
      padding: 10px;
      width: 70%;
      text-align: left;
      border: none;
      outline: none;
      transition: 0.4s;
      font-size: 14px;
      font-weight: 500;
      line-height: 1.5;
      position: relative;
      padding-left: 40px;
      transition: all 0.2s ease;
    }

    .faq__question:after {
      content: "\02795";
      position: absolute;
      left: 10px;
      font-size: 14px;
    }

    .faq__question_active:after {
      content: "\2796";
      color: white;
      position: absolute;
      left: 10px;
      font-size: 14px;
    }

    .faq__subtitle {
      font-size: 18px;
      font-weight: 400;
      line-height: 1.55;
      padding-top: 8px;
      padding-bottom: 10px;
    }

    .faq__panel {
      display: none;
      text-align: left;
      font-size: 14px;
      line-height: 1.5;
      padding-left: 15%;
      max-width: 70%;
      overflow: hidden;
    }

    .faq__question:hover {
      background-color: #8b7197;
    }

    .faq__panel_active {
      display: block;
    }
    .submit-btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #8b7197;
      color: white;
      border: none;
      cursor: pointer;
    }
    button[type=submit]:focus{
      border-color:dodgerBlue;
      box-shadow:0 0 8px 0 dodgerBlue;
    }
  </style>
</head>

<body>
  <div class="container-faq">
    <div class="faq">
      <h2 class="faq__title">Ask Questions
      </h2>

      

      <form>
      <input class="faq__question" type="text" placeholder="Enter your question">
      <button type="submit" class="submit-btn">Submit</button>
      </form>

      <h2 class="faq__title">Frequently asked questions</h2>
      <p class="faq__subtitle">
        Something is not clear? You need help? Check our FAQ section!
      </p>
      <button class="faq__question">How can I place an order on your website?</button>
      <div class="faq__panel">
        <p class="faq__answer">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
          sint, hic consequuntur consectetur, corporis enim ipsum quasi
          recusandae vel nobis, exercitationem aspernatur autem vero ad soluta
          eius ipsam praesentium aliquam!
        </p>
      </div>
      <button class="faq__question">
      Do you offer wholesale or bulk ordering options?
      </button>
      <div class="faq__panel">
        <p class="faq__answer">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
          sint, hic consequuntur consectetur, corporis enim ipsum quasi
          recusandae vel nobis, exercitationem aspernatur autem vero ad soluta
          eius ipsam praesentium aliquam!
        </p>
      </div>
      <button class="faq__question">
      Do you offer Can I cancel or edit my order?
      </button>
      <div class="faq__panel">
        <p class="faq__answer">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
          sint, hic consequuntur consectetur, corporis enim ipsum quasi
          recusandae vel nobis, exercitationem aspernatur autem vero ad soluta
          eius ipsam praesentium aliquam!
        </p>
      </div>
      <button class="faq__question">
      What type of fabric do you use?
      </button>
      <div class="faq__panel">
        <p class="faq__answer">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
          sint, hic consequuntur consectetur, corporis enim ipsum quasi
          recusandae vel nobis, exercitationem aspernatur autem vero ad soluta
          eius ipsam praesentium aliquam!
        </p>
      </div>
      <button class="faq__question">Can I change my shipping address?</button>
      <div class="faq__panel">
        <p class="faq__answer">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
          sint, hic consequuntur consectetur, corporis enim ipsum quasi
          recusandae vel nobis, exercitationem aspernatur autem vero ad soluta
          eius ipsam praesentium aliquam!
        </p>
      </div>
      <button class="faq__question">  What are my payment options?</button>
      <div class="faq__panel">
        <p class="faq__answer">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
          sint, hic consequuntur consectetur, corporis enim ipsum quasi
          recusandae vel nobis, exercitationem aspernatur autem vero ad soluta
          eius ipsam praesentium aliquam!
        </p>
      </div>
      <button class="faq__question">How long does it take to process and deliver orders?</button>
      <div class="faq__panel">
        <p class="faq__answer">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
          sint, hic consequuntur consectetur, corporis enim ipsum quasi
          recusandae vel nobis, exercitationem aspernatur autem vero ad soluta
          eius ipsam praesentium aliquam!
        </p>
      </div>
      <button class="faq__question">Can I track the status of my order?</button>
      <div class="faq__panel">
        <p class="faq__answer">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
          sint, hic consequuntur consectetur, corporis enim ipsum quasi
          recusandae vel nobis, exercitationem aspernatur autem vero ad soluta
          eius ipsam praesentium aliquam!
        </p>
      </div>
    </div>
  </div>

  <script>
    let questions = document.querySelectorAll(".faq__question");
    questions.forEach((question) => {
      question.addEventListener("click", function () {
        question.classList.toggle("faq__question_active");
        const nextElement = question.nextElementSibling;
        nextElement.classList.toggle("faq__panel_active");
      });
    });

  </script>
</body>

</html>

<?php
//Linking footer
include "footer.php";
?>