<?php

namespace Fiyo\Mattermost\Request;

/**
 * Class AbstractAuthorisedPagedGetRequest
 * @package Fiyo\Mattermost\Request
 */
abstract class AbstractAuthorisedPagedGetRequest extends AbstractAuthorisedGetRequest
{
    const PARAMETER_PAGE  = 'page';
    const PARAMETER_LIMIT = 'per_page';

    const PAGE_DEFAULT  = 0;
    const LIMIT_DEFAULT = 60;

    /**
     * @var int
     */
    protected $page = self::PAGE_DEFAULT;

    /**
     * @var int
     */
    protected $limit = self::LIMIT_DEFAULT;

    /**
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return array
     */
    protected function getOptionalParameters(): array
    {
        return [];
    }

    /**
     * @return array
     */
    final public function getParameters(): array
    {
        $parameters = [
            self::PARAMETER_PAGE => $this->page,
            self::LIMIT_DEFAULT => $this->limit,
        ];

        return array_merge($parameters, $this->getOptionalParameters());
    }
}