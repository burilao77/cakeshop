<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Shoppings Controller
 *
 * @property \App\Model\Table\ShoppingsTable $Shoppings
 *
 * @method \App\Model\Entity\Shopping[] paginate($object = null, array $settings = [])
 */
class ShoppingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $shoppings = $this->paginate($this->Shoppings);

        $this->set(compact('shoppings'));
        $this->set('_serialize', ['shoppings']);
    }

    /**
     * View method
     *
     * @param string|null $id Shopping id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shopping = $this->Shoppings->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('shopping', $shopping);
        $this->set('_serialize', ['shopping']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shopping = $this->Shoppings->newEntity();
        if ($this->request->is('post')) {
            $shopping = $this->Shoppings->patchEntity($shopping, $this->request->getData());
            if ($this->Shoppings->save($shopping)) {
                $this->Flash->success(__('The shopping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shopping could not be saved. Please, try again.'));
        }
        $products = $this->Shoppings->Products->find('list', ['limit' => 200]);
        $this->set(compact('shopping', 'products'));
        $this->set('_serialize', ['shopping']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shopping id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shopping = $this->Shoppings->get($id, [
            'contain' => ['Products']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shopping = $this->Shoppings->patchEntity($shopping, $this->request->getData());
            if ($this->Shoppings->save($shopping)) {
                $this->Flash->success(__('The shopping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shopping could not be saved. Please, try again.'));
        }
        $products = $this->Shoppings->Products->find('list', ['limit' => 200]);
        $this->set(compact('shopping', 'products'));
        $this->set('_serialize', ['shopping']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shopping id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shopping = $this->Shoppings->get($id);
        if ($this->Shoppings->delete($shopping)) {
            $this->Flash->success(__('The shopping has been deleted.'));
        } else {
            $this->Flash->error(__('The shopping could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
