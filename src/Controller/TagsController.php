<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 * @method \App\Model\Entity\Tag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsController extends AppController
{
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'edit','views','add', 'tags'])) {
            return true;
        }
        // All other actions require an id.
        if (!$this->request->getParam('pass.0')) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->getParam('pass.0');
        $tag = $this->Tags->get($id);
        if ($tag->id == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tags = $this->paginate($this->Tags);

        $this->set(compact('tags'));
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Bookmarks'],
        ]);

        $this->set(compact('tag'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tag = $this->Tags->newEmptyEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $bookmarks = $this->Tags->Bookmarks->find('list', ['limit' => 200])->all();
        $this->set(compact('tag', 'bookmarks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Bookmarks'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $bookmarks = $this->Tags->Bookmarks->find('list', ['limit' => 200])->all();
        $this->set(compact('tag', 'bookmarks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        if ($this->Tags->delete($tag)) {
            $this->Flash->success(__('The tag has been deleted.'));
        } else {
            $this->Flash->error(__('The tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
