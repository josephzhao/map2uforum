<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FrequentlyAskedQuestionAnswers
 */
class FrequentlyAskedQuestionAnswers
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $answer;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Map2u\ForumBundle\Entity\FrequentlyAskedQuestions
     */
    private $question;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return FrequentlyAskedQuestionAnswers
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return FrequentlyAskedQuestionAnswers
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set question
     *
     * @param \Map2u\ForumBundle\Entity\FrequentlyAskedQuestions $question
     * @return FrequentlyAskedQuestionAnswers
     */
    public function setQuestion(\Map2u\ForumBundle\Entity\FrequentlyAskedQuestions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Map2u\ForumBundle\Entity\FrequentlyAskedQuestions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
