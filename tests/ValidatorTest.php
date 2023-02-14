<?php
use PHPUnit\Framework\TestCase;
use App\Services\ValidatorService;

class ValidatorTest extends TestCase{

    public function testRejectInvalidEmail()
    {
        $email = "Abc.example.com";
        $isValid = ValidatorService::validateEmail($email);

        $this->assertEquals(false, $isValid);
    }

    public function testAcceptValidEmail()
    {
        $email = "email@example.com";
        $isValid = ValidatorService::validateEmail($email);

        $this->assertEquals($email, $isValid);
    }

    public function testWhiteSpaceIsRemoved()
    {
        $text = " Hello World ";
        $trimmedText = ValidatorService::sanitize_text($text);

        $this->assertEquals("Hello World", $trimmedText);

    }

    public function testPhpTagsAreRemoved()
    {
        $text = "Testing <?php echo hello world ?>";
        $stripedPhp = ValidatorService::sanitize_text($text);

        $this->assertEquals("Testing", $stripedPhp);
    }

    public function testHtmlTagsAreRemoved()
    {
        $text = "Check this <b>out</b>";
        $stripedHtml = ValidatorService::sanitize_text($text);

        $this->assertEquals("Check this out", $stripedHtml);

    }

    public function testRejectsNonAlphanumericValue()
    {
        $text = "abcd";
        $isValid = ValidatorService::isAlphaNumeric($text);

        $this->assertEquals(false, $isValid);
    }

    public function testAcceptsAlphanumericValue()
    {
        $text = "ab2cb";
        $isValid = ValidatorService::isAlphaNumeric($text);

        $this->assertEquals(true, $isValid);
    }

    public function testRejectNonNumericValue()
    {
        $value = "2e";
        $isValid = ValidatorService::isNumber($value);

        $this->assertEquals(false, $isValid);
    }

    public function testAcceptNumericValue()
    {
        $value = "25";
        $isValid = ValidatorService::isNumber($value);

        $this->assertEquals(true, $value);
    }
}