package br.com.joaopadilha.attomos.game.control;

import static br.com.joaopadilha.attomos.config.DeviceSettings.screenHeight;
import static br.com.joaopadilha.attomos.config.DeviceSettings.screenResolution;
import static br.com.joaopadilha.attomos.config.DeviceSettings.screenWidth;

import org.cocos2d.layers.CCLayer;
import org.cocos2d.types.CGPoint;

import br.com.joaopadilha.attomos.config.Assets;
import br.com.joaopadilha.attomos.game.scenes.GameScene;


public class GameButtons extends CCLayer implements ButtonDelegate {

	private Button leftControl;
	private Button rightControl;
	private Button shootButton;
	private Button pauseButton;
	
	private GameScene delegate;
	
	public static GameButtons gameButtons() {
		return new GameButtons();
	}

	public GameButtons() {

		// Enable Touch
		this.setIsTouchEnabled(true);
		
		// Create Buttons
		//this.leftControl 	= new Button(Assets.LEFTCONTROL);
		//this.rightControl 	= new Button(Assets.RIGHTCONTROL);
		this.shootButton 	= new Button(Assets.SHOOTBUTTON);
		this.pauseButton 	= new Button(Assets.PAUSE);
		
		// Set Buttons Delegates
		//this.leftControl.setDelegate(this);
		//this.rightControl.setDelegate(this);
		this.shootButton.setDelegate(this);
		this.pauseButton.setDelegate(this);
		
		// set position
		setButtonspPosition();

		// Add Buttons to Screen
		//addChild(leftControl);
		//addChild(rightControl);
		addChild(shootButton);
		addChild(pauseButton);
		
	}
	
	private void setButtonspPosition() {

		// Buttons Positions
		//leftControl.setPosition(screenResolution(CGPoint.ccp( 40  , 40 ))) ;
		//rightControl.setPosition(screenResolution(CGPoint.ccp( 100 , 40 ))) ;
		shootButton.setPosition(screenResolution(CGPoint.ccp( screenWidth() -40 , 40 ))) ;
		
		pauseButton.setPosition(screenResolution(CGPoint.ccp( 40  , screenHeight() - 30 ))) ;
	}

	@Override
	public void buttonClicked(Button sender) {
		
		if (sender.equals(this.leftControl)) {
			this.delegate.moveLeft();
		}
		
		if (sender.equals(this.rightControl)) {
			this.delegate.moveRight();
		}

		if (sender.equals(this.shootButton)) {
			this.delegate.shoot();
		}
		
		if (sender.equals(this.pauseButton)) {
			this.delegate.pauseGameAndShowLayer();
		}

	}

	public void setDelegate(GameScene gameScene) {
		this.delegate = gameScene;
		
	}

}