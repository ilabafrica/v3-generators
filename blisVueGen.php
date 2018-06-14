<?php
// '.$vueComponent['entity'].'
// '.$vueComponent['url'].'

$vueComponents=[
  [
    'url' => '/api/location',
    'path' => '/var/www/Blis-V3/resources/assets/js/components/labconfiguration/healthunit.vue',
    'entity' => 'locations',
    'name' => 'Health Units',
    'fields' => [
      [
        'text'=>'Name',
        'value'=>'name',
        'init'=>'\'\'',// can be 0 for integer: this one is for string
      ],
      [
        'text'=>'Code',
        'value' => 'identifier',
        'init'=>'\'\'',// can be 0 for integer: this one is for string
      ]
    ],
  ],
];

foreach ($vueComponents as $vueComponent) {
    $template = '';
    $template.='<template>
  <div>
    <v-dialog v-model="dialog" max-width="500px">
      <v-btn slot="activator" color="primary" dark class="mb-2">New Item</v-btn>
      <v-card>
        <v-card-title>
          <span class="headline">{{ formTitle }}</span>
        </v-card-title>
        <v-form ref="form" v-model="valid" lazy-validation>
        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>';

      foreach ($vueComponent['fields'] as $key => $field) {

        $template.='
              <v-flex xs12 sm6 md4>
                <v-text-field
                  v-model="editedItem.'.$field['value'].'"
                  :rules="[v => !!v || \''.$field['text'].' is Required\']"
                  label="'.$field['text'].'">
                </v-text-field>
              </v-flex>';
          
      }

      $template.='
            </v-layout>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click.native="close">Cancel</v-btn>
          <v-btn color="blue darken-1" :disabled="!valid" flat @click.native="save">Save</v-btn>
        </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>

    <v-card-title>
      '.$vueComponent['name'].'
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        v-on:keyup.enter="initialize"
        hide-details>
      </v-text-field>
    </v-card-title>

    <v-data-table
      :headers="headers"
      :items="'.$vueComponent['entity'].'"
      hide-actions
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">';

      // table iteration creating columns
      foreach ($vueComponent['fields'] as $key => $field) {
        // first column
        if ($key === 0) {
            $template.='
        <td>{{ props.item.'.$field['value'].' }}</td>';

        }else{
          $template.='
        <td class="text-xs-right">{{ props.item.'.$field['value'].' }}</td>';
          
        }
      }
      // last column: action column
      $template.='
        <td class="justify-center layout px-0">
          <v-btn icon class="mx-0" @click="editItem(props.item)">
            <v-icon color="teal">edit</v-icon>
          </v-btn>
          <v-btn icon class="mx-0" @click="deleteItem(props.item)">
            <v-icon color="pink">delete</v-icon>
          </v-btn>
        </td>';

      $template.='
      </template>
    </v-data-table>
    <div class="text-xs-center">
      <v-pagination
        :length="length"
        :total-visible="pagination.visible"
        v-model="pagination.page"
        @input="initialize"
        circle>
      </v-pagination>
    </div>
  </div>
</template>
<script>
  import apiCall from \'../../utils/api\'
  export default {
    data: () => ({
      valid: true,
      dialog: false,
      delete: false,
      saving: false,
      search: \'\',
      query: \'\',
      pagination: {
        page: 1,
        per_page: 0,
        total: 0,
        visible: 10
      },
      headers: [';

      foreach ($vueComponent['fields'] as $key => $field) {
        // first column
        $template.='
        { text: \''.$field['text'].'\', value: \''.$field['value'].'\' },';
      }
      // last action column
      $template.='
        { text: \'Actions\', value: \'name\', sortable: false }';

        $template.='
      ],
      '.$vueComponent['entity'].': [],
      editedIndex: -1,
      editedItem: {';

      foreach ($vueComponent['fields'] as $key => $field) {

        $template.='
        '.$field['value'].': '.$field['init'].',';
          
      }

      $template.='
      },
      defaultItem: {';

      foreach ($vueComponent['fields'] as $key => $field) {

        $template.='
        '.$field['value'].': '.$field['init'].',';
          
      }

      $template.='
      }
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? \'New Item\' : \'Edit Item\'
      },

      length: function() {
        return Math.ceil(this.pagination.total / 10);
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      }
    },

    created () {
      this.initialize()
    },

    methods: {

      initialize () {

        this.query = \'page=\'+ this.pagination.page;
        if (this.search != \'\') {
            this.query = this.query+\'&search=\'+this.search;
        }

        apiCall({url: \''.$vueComponent['url'].'?\' + this.query, method: \'GET\' })
        .then(resp => {
          console.log(resp)
          this.'.$vueComponent['entity'].' = resp.data;
          this.pagination.total = resp.total;
        })
        .catch(error => {
          console.log(error.response)
        })
      },

      editItem (item) {
        this.editedIndex = this.'.$vueComponent['entity'].'.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {

        confirm(\'Are you sure you want to delete this item?\') && (this.delete = true)

        if (this.delete) {
          const index = this.'.$vueComponent['entity'].'.indexOf(item)
          this.'.$vueComponent['entity'].'.splice(index, 1)
          apiCall({url: \''.$vueComponent['url'].'/\'+item.id, method: \'DELETE\' })
          .then(resp => {
            console.log(resp)
          })
          .catch(error => {
            console.log(error.response)
          })
        }

      },

      close () {
        this.dialog = false

        // if not saving reset dialog references to datatables
        if (!this.saving) {
          this.resetDialogReferences();
        }
      },

      resetDialogReferences() {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      },

      save () {

        this.saving = true;
        // update
        if (this.editedIndex > -1) {

          apiCall({url: \''.$vueComponent['url'].'/\'+this.editedItem.id, data: this.editedItem, method: \'PUT\' })
          .then(resp => {
            Object.assign(this.'.$vueComponent['entity'].'[this.editedIndex], this.editedItem)
            console.log(resp)
            this.resetDialogReferences();
            this.saving = false;
          })
          .catch(error => {
            console.log(error.response)
          })

        // store
        } else {

          apiCall({url: \''.$vueComponent['url'].'\', data: this.editedItem, method: \'POST\' })
          .then(resp => {
            this.'.$vueComponent['entity'].'.push(this.editedItem)
            console.log(resp)
            this.resetDialogReferences();
            this.saving = false;
          })
          .catch(error => {
            console.log(error.response)
          })
        }
        this.close()

      }
    }
  }
</script>';

    $componentFile = fopen($vueComponent['path'], "w") or die("Unable to open file!");

    fwrite($componentFile, $template);
    fclose($componentFile);
}




