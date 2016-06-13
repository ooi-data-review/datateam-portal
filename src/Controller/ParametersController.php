<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parameters Controller
 *
 * @property \App\Model\Table\ParametersTable $Parameters
 */
class ParametersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParameterFunctions']
        ];
        $parameters = $this->paginate($this->Parameters);

        $this->set(compact('parameters'));
        $this->set('_serialize', ['parameters']);
    }

    /**
     * View method
     *
     * @param string|null $id Parameter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parameter = $this->Parameters->get($id, [
            'contain' => ['ParameterFunctions', 'Streams']
        ]);

        $this->set('parameter', $parameter);
        $this->set('_serialize', ['parameter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function admin_add()
    {
        $parameter = $this->Parameters->newEntity();
        if ($this->request->is('post')) {
            $parameter = $this->Parameters->patchEntity($parameter, $this->request->data);
            if ($this->Parameters->save($parameter)) {
                $this->Flash->success(__('The parameter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parameter could not be saved. Please, try again.'));
            }
        }
        $parameterFunctions = $this->Parameters->ParameterFunctions->find('list', ['limit' => 200]);
        $streams = $this->Parameters->Streams->find('list', ['limit' => 200]);
        $this->set(compact('parameter', 'parameterFunctions', 'streams'));
        $this->set('_serialize', ['parameter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parameter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function admin_edit($id = null)
    {
        $parameter = $this->Parameters->get($id, [
            'contain' => ['Streams']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parameter = $this->Parameters->patchEntity($parameter, $this->request->data);
            if ($this->Parameters->save($parameter)) {
                $this->Flash->success(__('The parameter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parameter could not be saved. Please, try again.'));
            }
        }
        $parameterFunctions = $this->Parameters->ParameterFunctions->find('list', ['limit' => 200]);
        $streams = $this->Parameters->Streams->find('list', ['limit' => 200]);
        $this->set(compact('parameter', 'parameterFunctions', 'streams'));
        $this->set('_serialize', ['parameter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parameter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function admin_delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parameter = $this->Parameters->get($id);
        if ($this->Parameters->delete($parameter)) {
            $this->Flash->success(__('The parameter has been deleted.'));
        } else {
            $this->Flash->error(__('The parameter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}