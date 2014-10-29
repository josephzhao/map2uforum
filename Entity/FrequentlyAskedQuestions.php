<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FrequentlyAskedQuestions
 */
class FrequentlyAskedQuestions
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $question;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $answers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set question
     *
     * @param string $question
     * @return FrequentlyAskedQuestions
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return FrequentlyAskedQuestions
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return FrequentlyAskedQuestions
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
     * Add answers
     *
     * @param \Map2u\ForumBundle\Entity\FrequentlyAskedQuestionAnswers $answers
     * @return FrequentlyAskedQuestions
     */
    public function addAnswer(\Map2u\ForumBundle\Entity\FrequentlyAskedQuestionAnswers $answers)
    {
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \Map2u\ForumBundle\Entity\FrequentlyAskedQuestionAnswers $answers
     */
    public function removeAnswer(\Map2u\ForumBundle\Entity\FrequentlyAskedQuestionAnswers $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
