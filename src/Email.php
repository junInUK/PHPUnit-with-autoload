<?php declare(strict_types=1);

namespace PHPTestException;

use InvalidArgumentException;

/**
 * Email class
 * 
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <author@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */
final class Email
{
    private $_email;
    private $_Test = false;

    
    /**
     * __construct
     *
     * @param  mixed $email Input email address
     * @return void
     */
    private function __construct(string $email)
    {
        $this->_ensureIsValidEmail($email);
        $this->email = $email;
    }

    
    /**
     * Function fromString
     *
     * @param  mixed $email Input email address
     * @return self
     */
    public static function fromString(string $email): self
    {
        return new self($email);
    }

        
    /**
     * __toString
     *
     * @return string
     */
    public function __toString(): string 
    {
        return $this->email;
    }

        
    /**
     * Function ensureIsValidEmail
     *
     * @param  mixed $email Input email addresss
     * @return void
     */
    private function _ensureIsValidEmail(string $email): void 
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('"%s" is not a valid email addresss', $email)
            );
            // printf('"%s" is not a valid email address', $email);
        }
    }
}
