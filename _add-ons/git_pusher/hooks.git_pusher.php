<?php

use Github\Client as GitHub;

class Hooks_git_pusher extends Hooks
{
    public function control_panel__publish($content) {

	
        $client = new GitHub();
        $client->authenticate(
            Config::get('git_user_name'), Config::get('git_user_pass'), GitHub::AUTH_HTTP_PASSWORD
        );

        $member = Auth::getCurrentMember();
        $path = $this->transformToGitPath($content['file']);

        try {

            $isExists = $client->api('repo')->contents()->exists(
                Config::get('git_repository_owner'), Config::get('git_repository'), 'dot-net-csharp'
            );

            if($isExists) {
                $oldFile = $client->api('repo')->contents()->show(
                    Config::get('git_repository_owner'),
                    Config::get('git_repository'),
                    $path,
                    Config::get('git_repository_branch')
                );

                $client->api('repo')->contents()->update(
                    Config::get('git_repository_owner'),
                    Config::get('git_repository'),
                    $path,
                    $this->getContent($content),
                    sprintf('%s has updated %s document.', ucfirst($member->get('username')), $path),
                    $oldFile['sha'],
                    Config::get('git_repository_branch')
                );
            }
        } catch(Exception $ex) {
            $this->log->debug($ex->getMessage());
        }
	
        return $content;
    }

    /**
     * Transform CMS path to GIT path
     * @param $cmsPath
     * @return mixed
     */
    protected function transformToGitPath($cmsPath) {

        $path = preg_replace('/\/_content\/([0-9]{1,2}-[a-z]+\/)/i', '', $cmsPath);
        return preg_replace('/page.md/i', Config::get('_git_file_name'), $path);
    }

    /**
     * Cut only markdown content
     * @param $cmsContent
     * @return mixed
     */
    protected function getContent($cmsContent) {

        preg_match('/<div markdown="1">(.+)<\/div>/is', $cmsContent['content'], $matches);
        return $matches[1];
    }
}