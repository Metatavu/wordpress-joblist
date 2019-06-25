import React from 'react';
import { wp, WPSelectControlOption } from 'wp';

declare var wp: wp;
const { __ } = wp.i18n;

/**
 * Interface describing component props
 */
interface Props {
  getAttribute: (attribute: string) => string,
  setAttribute: (attribute: string, value: string) => void
}

/**
 * Interface describing component state
 */
interface State {
}

/**
 * Event list component
 */
class EventList extends React.Component<Props, State> {

  /*
   * Constructor
   * 
   * @param props props
   */
  constructor(props: Props) {
    super(props);
    this.state = {
    };
  }

  /**
   * Component did update life-cycle event
   * 
   * @param prevProps previous props
   * @param prevState previous state
   */
  public componentDidUpdate(prevProps: Props, prevState: State) {
    
  }

  /**
   * Component render method
   */
  public render() {
    const { InspectorControls } = wp.editor;

    return (
      <InspectorControls>
        { this.renderSortByFilter() }
        { this.renderSortDirFilter() }
        { this.renderFirstResultFilter() }
        { this.renderMaxResultsFilter() }
      </InspectorControls>
    );
  }

  /**
   * Renders start filter
   */
  private renderSortByFilter = () => {
    const title = __("Sort by", "joblist");
    const hint = __("Sort jobs by", "joblist");

    return this.renderSelectControlFilter(title, hint, "sort-by", [{
      value: "PUBLICATION_START",
      label: __("Publication start", "joblist")
    }, {
      value: "PUBLICATION_END",
      label: __("Publication end", "joblist")
    }]);
  } 

  /**
   * Renders end filter
   */
  private renderSortDirFilter = () => {
    const title = __("Sort direction", "joblist");
    const hint = __("Display jobs in descending or ascending order", "joblist");

    return this.renderSelectControlFilter(title, hint, "sort-dir", [{
      value: "ASCENDING",
      label: __("Descending", "joblist")
    }, {
      value: "DESCENDING",
      label: __("Ascending", "joblist")
    }]);
  } 

  /**
   * Renders bbox filter
   */
  private renderFirstResultFilter = () => {
    const title = __("First result", "joblist");
    const hint = __("Skip jobs before this job.", "joblist");
    return this.renderNumberControlFilter(title, hint, "first-result");
  } 

  /**
   * Renders location filter
   */
  private renderMaxResultsFilter = () => {
    const title = __("Max results", "joblist");
    const hint = __("Max number of jobs to list", "joblist");
    return this.renderNumberControlFilter(title, hint, "max-results");
  }

  /**
   * Renders select control filter
   * 
   * @param title filter title
   * @param hint filter hint text
   * @param attribute attribute for storing filter value
   * @param options options
   */
  private renderSelectControlFilter = (title: string, hint: string, attribute: string, options: WPSelectControlOption[]) => {
    return this.renderSelectControl(title, hint, attribute, options);
  }

  /**
   * Renders select control
   * 
   * @param title filter title
   * @param hint filter hint text
   * @param attribute attribute for storing value
   * @param options options
   */
  private renderSelectControl = (title: string, hint: string, attribute: string, options: WPSelectControlOption[]) => {
    const { SelectControl, Tooltip } = wp.components;

    return (
      <div>
        <Tooltip text={ hint } >
          <label> { title } </label>
        </Tooltip>
        <SelectControl value={ this.props.getAttribute(attribute) } onChange={(value: string) => this.props.setAttribute(attribute, value) } options={ options }></SelectControl>
      </div>
    );
  }

  /**
   * Renders text control filter
   * 
   * @param title filter title
   * @param hint filter hint text
   * @param attribute attribute for storing filter value
   */
  private renderNumberControlFilter = (title: string, hint: string, attribute: string) => {
    return this.renderNumberControl(title, hint, attribute);
  }

  /**
   * Renders text control
   * 
   * @param title title
   * @param hint hint text
   * @param attribute attribute for storing value
   */
  private renderNumberControl = (title: string, hint: string, attribute: string) => {
    const { TextControl, Tooltip } = wp.components;

    return (
      <div>
        <Tooltip text={ hint } >
          <label> { title } </label>
        </Tooltip>
        <TextControl type="number" value={ this.props.getAttribute(attribute) } onChange={(value: string) => this.props.setAttribute(attribute, value) }></TextControl>
      </div>
    );
  }

}

export default EventList;