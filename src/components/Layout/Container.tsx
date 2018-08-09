import React from 'react';
import classNames from 'classnames';
import styles from 'components/Layout/Container.module.css';

export interface IContainerProps {
    className?: string;
    backgroundClass?: string;
}

export default class Container extends React.Component<IContainerProps> {
    render() {
        const containerStyle = classNames(styles.Container, this.props.className);
        if (this.props.backgroundClass) {
            const bgClass = classNames(styles.BgContainer, this.props.backgroundClass);
            return (
                <div className={bgClass}>
                    <div className={containerStyle}>{this.props.children}</div>
                </div>
            );
        } else {
            return <div className={containerStyle}>{this.props.children}</div>;
        }
    }
}
