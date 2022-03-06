# Midterm Requirements

The goal of this project is to build a simple Q&A website. A visitor should be able to ask questions and leave answers without any authentication.

[Here is a working example of what you're going to build](https://itp405-midterm-2022.herokuapp.com/).

The styles don't need to match exactly, but you should display all of the same data and have the same URLs, document titles (the title in the browser tab), success messages, and error messages. It should _function_ exactly the same as the example.

## Database

Create 2 migrations:

```bash
php artisan make:migration create_questions_table
php artisan make:migration create_answers_table
```

Place the following code in the `create_questions_table` migration file:

```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
```

Place the following code in the `create_answers_table` migration file:

```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
```

Now run the migrations.

## The Questions Page

**For this page, you must use Eloquent.**

1. The question form **must** be validated. If the form fails validation, it must stay populated with what the user entered, rather than getting reset. The question form must have the following validation rules applied via Laravel's Validation library:

-   Required
-   Minimum length: 5
-   **Ends with** a question mark ("?"). See the [ends_with](https://laravel.com/docs/9.x/validation#rule-ends-with) rule.
-   Must be **unique**. The same question can't be asked more than once. See the [unique](https://laravel.com/docs/9.x/validation#rule-unique) rule.

Display validation error messages underneath the textarea in red like in the example.

1. When a question is successfully created, redirect to that question's page.
1. A green success alert/notification that contains the question should be shown as a flash message when a question is created. See the example.
1. The list of questions **must** be sorted from **newest to oldest**.
1. Display `questions.created_at` formatted like `3/6/2022 at 10:56 PM` using PHP's [`date_format()`](https://www.php.net/manual/en/datetime.format.php) function. Here are a few examples:
    - `date_format('2022-03-06 22:56:02', 'n/j/Y')` will produce 3/6/2022
    - `date_format('2022-03-06 22:56:02', 'g:i A')` will produce 10:56 PM
1. Display the number of answers that each question contains.
    - Hint: In our class example, let's say I wanted to count how many invoice items there are in an invoice. We could do this via the following using PHP's `count()` function: `count($invoice->invoiceItems)`.
1. This page should execute no more than 2 queries on page load. Use the [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) to monitor database queries.

## The Answers Page

1. The answer form **must** be validated. If the form fails validation, it must stay populated with what the user entered, rather than getting reset. The answer form must have the following validation rules applied via Laravel's Validation library:

-   Required
-   Minimum length: 5

Display validation error messages underneath the textarea in red like in the example.

1. If a question doesn't have any answers, display "No answers yet! Be the first to answer by using the form below.".
1. When an answer is successfully created, redirect back to the question page that you submitted your answer on.
1. A green success alert/notification that contains the answer should be shown as a flash message when an answer is created. See the example.
1. The list of answers **must** be sorted from **newest to oldest**.
1. The document title (the title in the browser tab) should contain the question like in the example.
1. Display `answers.created_at` formatted like `3/6/2022 at 10:56 PM` using PHP's [`date_format()`](https://www.php.net/manual/en/datetime.format.php) function. Here are a few examples:
    - `date_format('2022-03-06 22:56:02', 'n/j/Y')` will produce 3/6/2022
    - `date_format('2022-03-06 22:56:02', 'g:i A')` will produce 10:56 PM

## Other Requirements

1. You must use Blade templating.
1. You must use a layout file.
1. All routes must map to a controller.
1. All URLs must use the `route()` helper function.
1. The "Q&A" title should be a link to the home page.
