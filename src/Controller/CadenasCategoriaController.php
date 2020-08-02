<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CadenasCategoria Controller
 *
 * @property \App\Model\Table\CadenasCategoriaTable $CadenasCategoria
 *
 * @method \App\Model\Entity\CadenasCategorium[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CadenasCategoriaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categorias'],
        ];
        $cadenasCategoria = $this->paginate($this->CadenasCategoria);

        $this->set(compact('cadenasCategoria'));
    }

    /**
     * View method
     *
     * @param string|null $id Cadenas Categorium id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cadenasCategorium = $this->CadenasCategoria->get($id, [
            'contain' => ['Categorias'],
        ]);

        $this->set('cadenasCategorium', $cadenasCategorium);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cadenasCategorium = $this->CadenasCategoria->newEntity();
        if ($this->request->is('post')) {
            $cadenasCategorium = $this->CadenasCategoria->patchEntity($cadenasCategorium, $this->request->getData());
            if ($this->CadenasCategoria->save($cadenasCategorium)) {
                $this->Flash->success(__('The cadenas categorium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cadenas categorium could not be saved. Please, try again.'));
        }
        $categorias = $this->CadenasCategoria->Categorias->find('list',  ['keyField' => 'id','valueField' => 'nombre']);
        $this->set(compact('cadenasCategorium', 'categorias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cadenas Categorium id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cadenasCategorium = $this->CadenasCategoria->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cadenasCategorium = $this->CadenasCategoria->patchEntity($cadenasCategorium, $this->request->getData());
            if ($this->CadenasCategoria->save($cadenasCategorium)) {
                $this->Flash->success(__('The cadenas categorium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cadenas categorium could not be saved. Please, try again.'));
        }
        $categorias = $this->CadenasCategoria->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('cadenasCategorium', 'categorias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cadenas Categorium id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cadenasCategorium = $this->CadenasCategoria->get($id);
        if ($this->CadenasCategoria->delete($cadenasCategorium)) {
            $this->Flash->success(__('The cadenas categorium has been deleted.'));
        } else {
            $this->Flash->error(__('The cadenas categorium could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
