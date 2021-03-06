import React from 'react';
import { wp, WPBlockTypeEditParams } from 'wp';
import ListIcon from "./list-icon";
import EventList from './components/event-list';
import EventListInspectorControls from './components/event-list-inspector-controls';

declare var wp: wp;
const { __ } = wp.i18n;

const { registerBlockType } = wp.blocks;

/**
 * Registers block type
 */
registerBlockType('joblist/list-block', {
  title: __( 'JobList list', 'joblist' ),
  icon: ListIcon,
  category: 'joblist',

  attributes: {
    "sort-by": {
      type: 'string'
    },
    "sort-dir": {
      type: 'string'
    },
    "first-result": {
      type: 'string'
    },
    "max-results": {
      type: 'string'
    }
  },

  /**
   * Block type edit method 
   */
  edit: ((params: WPBlockTypeEditParams) => {
    const { isSelected } = params;

    const getAttribute = (attribute: string): string => {
      return params.attributes[attribute];
    }

    const setAttribute = (attribute: string, value: string) => {
      const attributes: { [key: string]: string } = {}; 
      attributes[attribute] = value; 
      params.setAttributes(attributes);
    }

    return (
      <div>
        { isSelected ? <EventListInspectorControls getAttribute={ getAttribute } setAttribute={ (attribute: string, value: string) => setAttribute(attribute, value)  }/> : null }
        <EventList attributes={ params.attributes }/>
      </div>
    );
  }),

  /**
   * Block type save method 
   */
  save: (): any => {
    return null;
  }

});

