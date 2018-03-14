<?php
/**
 * Класс для удобной работы с cUrl
 * @see http://php.net/manual/ru/book.curl.php
 * @author Ivan Slyusar <i.slyusar@nag.ru>
 * @version 0.2018.03.141244
 */

namespace SNR;

class cUrl
{

    protected $verbose = true;
    protected $return_header = false;
    protected $http_header = ['Accept-Encoding: gzip'];
    protected $return_transfer = true;
    protected $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";


    /**
     * @var resource|bool
     */
    protected $ch = false;

    /**
     * Curl constructor.
     * @param bool $default
     */
    public function __construct($default = false)
    {
        $this->init($default);
    }

    public function init($default = false)
    {
        if($this->ch !== false) {
            $this->close();
        }
        $this->ch = curl_init();

        if($default){
            $this->setVerbose();
            $this->setReturnHeader();
            $this->setHttpHeader();
            $this->setReturnTransfer();
            $this->setUserAgent();
        }
    }

    public function close()
    {
        $this->ch = curl_close($this->ch);
    }

    /**
     * @return array
     */
    public function getError()
    {
        return json_encode([
            'errno' => curl_errno($this->ch),
            'error' => curl_error($this->ch)
        ]);
    }

    public function execute()
    {
        return curl_exec($this->ch);
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->setopt(CURLOPT_URL, $url);
    }

    /**
     * @param bool $post
     */
    public function setPost($post)
    {
        $this->setopt(CURLOPT_POST, $post);
    }

    /**
     * @param array|string $post_fields
     */
    public function setPostFields($post_fields)
    {
        $this->setopt(CURLOPT_POSTFIELDS, $post_fields);
    }


    /**
     * @param bool|null $verbose
     */
    public function setVerbose($verbose = null)
    {
        if($verbose === null){
            $verbose = $this->verbose;
        }
        $this->setopt(CURLOPT_VERBOSE, $verbose);
    }

    /**
     * @param bool|null $return_header
     */
    public function setReturnHeader($return_header = null)
    {
        if($return_header === null){
            $return_header = $this->return_header;
        }
        $this->setopt(CURLOPT_HEADER, $return_header);
    }

    /**
     * @param array $http_header
     */
    public function setHttpHeader($http_header = null)
    {
        if($http_header === null){
            $http_header = $this->http_header;
        }
        $this->setopt(CURLOPT_HTTPHEADER, $http_header);
    }

    /**
     * @param bool $return_transfer
     */
    public function setReturnTransfer($return_transfer = null)
    {
        if($return_transfer === null){
            $return_transfer = $this->return_transfer;
        }
        $this->setopt(CURLOPT_RETURNTRANSFER, $return_transfer);
    }

    /**
     * @param string $user_agent
     */
    public function setUserAgent($user_agent = null)
    {
        if($user_agent === null){
            $user_agent = $this->user_agent;
        }
        $this->setopt(CURLOPT_USERAGENT, $user_agent);
    }

    /**
     * @param bool $ssl_verify_peer
     */
    public function setSslVerifyPeer($ssl_verify_peer)
    {
        $this->setopt(CURLOPT_SSL_VERIFYPEER, $ssl_verify_peer);
    }

    /**
     * @param int $option
     * @param mixed $value
     */
    public function setopt($option, $value)
    {
        curl_setopt($this->ch, $option, $value);
    }
}
